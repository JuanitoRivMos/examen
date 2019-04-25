<?php

namespace App\Http\Controllers;

use \App\Models\Empresario;
use Illuminate\Http\Request;

class EmpresariosController extends Controller
{
    public function index(){
    	$empresarios=Empresario::where('activo',1)->get();
    	return view('empresarios.index',compact('empresarios'));
    }

    public function create(){
    	return view('empresarios.create',compact('empresarios'));
    }

    public function store(Request $request){
    	$nuevo=new Empresario();
    	$existente=Empresario::where('codigo',$request->codigo)->first();
    	if ($existente) {
    		return redirect()->back()->withErrors(['Código duplicado'])->withInput();
    	}

    	if (!$this->validarMoneda($request)) {
    		return redirect()->back()->withErrors(['Tipo de moneda no válido'])->withInput();
    	}
    	
		$nuevo->codigo=$request->codigo;
		$nuevo->razonsocial=$request->razonsocial;
		$nuevo->nombre=$request->nombre;
		$nuevo->pais=$request->pais;
		$nuevo->tipo_moneda=$request->tipo_moneda;
		$nuevo->estado=$request->estado;
		$nuevo->ciudad=$request->ciudad;
		$nuevo->telefono=$request->telefono;
		$nuevo->save();
    	return redirect()->action('EmpresariosController@index');
    }

    public function edit($id){
    	$empresario=Empresario::findOrFail($id);
    	return view('empresarios.edit',compact('empresario'));
    }

    public function update(Request $request,$id){
    	$empresario=Empresario::findOrFail($id);
    	$existente=Empresario::where('codigo',$request->codigo)->where('id','<>',$id)->first();
    	if ($existente) {
    		return redirect()->back()->withErrors(['Código duplicado']);
    	}

    	if (!$this->validarMoneda($request)) {
    		return redirect()->back()->withErrors(['Tipo de moneda no válido']);
    	}

    	$empresario->codigo=$request->codigo;
		$empresario->razonsocial=$request->razonsocial;
		$empresario->nombre=$request->nombre;
		$empresario->pais=$request->pais;
		$empresario->tipo_moneda=$request->tipo_moneda;
		$empresario->estado=$request->estado;
		$empresario->ciudad=$request->ciudad;
		$empresario->telefono=$request->telefono;
		$empresario->activo=$request->activo==1?($request->activo):(0);
		$empresario->save();
    	return redirect()->action('EmpresariosController@index');
    }

    public function destroy($id){
    	$empresario=Empresario::findOrFail($id);
    	$empresario->delete();
    	return redirect()->action('EmpresariosController@index');
    }

    public function validarMoneda($request){
    	$tipo_moneda=$request->tipo_moneda!=null?($request->tipo_moneda):('null');
		$respuesta = json_decode(json_encode(simplexml_load_string(file_get_contents('http://fx.currencysystem.com/webservices/CurrencyServer4.asmx/CurrencyExists?licenseKey=&currency='.$tipo_moneda), "SimpleXMLElement", LIBXML_NOCDATA)),TRUE);
		if ($respuesta[0]=='true') {
			return true;
		}else{
			return false;
		}
    }
}
