@extends('layouts.app')

@section('content')
<div class="container">
    <h1>EDITAR</h1>
    <br>
    <form action="{{ url('empresarios').'/'.$empresario->id.'' }}" method="post">
    	{{ method_field('PUT') }}
    	{{ csrf_field() }}
		<label for="codigo">codigo</label> <br>
		<input type="text" value="{{ $empresario->codigo }}" name="codigo" placeholder="codigo" id="codigo"><br>
		<label for="razonsocial">razonsocial</label> <br>
		<input type="text" value="{{ $empresario->razonsocial }}" name="razonsocial" placeholder="razonsocial" id="razonsocial"><br>
		<label for="nombre">nombre</label> <br>
		<input type="text" value="{{ $empresario->nombre }}" name="nombre" placeholder="nombre" id="nombre"><br>
		<label for="pais">pais</label> <br>
		<input type="text" value="{{ $empresario->pais }}" name="pais" placeholder="pais" id="pais"><br>
		<label for="tipo_moneda">tipo_moneda</label> <br>
		<input type="text" value="{{ $empresario->tipo_moneda }}" name="tipo_moneda" placeholder="tipo moneda" id="tipo_moneda"><br>
		<label for="estado">estado</label> <br>
		<input type="text" value="{{ $empresario->estado }}" name="estado" placeholder="estado" id="estado"><br>
		<label for="ciudad">ciudad</label> <br>
		<input type="text" value="{{ $empresario->ciudad }}" name="ciudad" placeholder="ciudad" id="ciudad"><br>
		<label for="telefono">telefono</label> <br>
		<input type="text" value="{{ $empresario->telefono }}" name="telefono" placeholder="telefono" id="telefono"><br>
		<label for="activo">Activo</label> <br>
		<select name="activo" id="activo">
			<option value="1" @if($empresario->activo) selected @endif>Activo</option>
			<option value="0" @if(!$empresario->activo) selected @endif>Inactivo</option>
		</select>
		<br>
		<button type="submit">Validar</button>
    </form>
 </div>
 @endsection
