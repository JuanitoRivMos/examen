@extends('layouts.app')

@section('content')
<div class="container">
    <h1>REGISTRAR</h1>
    <br>
    <form action="{{ url('empresarios') }}" method="post">
    	{{ csrf_field() }}
		<label for="codigo">codigo</label><br>
		<input type="text" value="{{old('codigo')}}" name="codigo" placeholder="codigo" id="codigo"><br>
		<label for="razonsocial">razonsocial</label><br>
		<input type="text" value="{{old('razonsocial')}}" name="razonsocial" placeholder="razonsocial" id="razonsocial"><br>
		<label for="nombre">nombre</label><br>
		<input type="text" value="{{old('nombre')}}" name="nombre" placeholder="nombre" id="nombre"><br>
		<label for="pais">pais</label><br>
		<input type="text" value="{{old('pais')}}" name="pais" placeholder="pais" id="pais"><br>
		<label for="tipo_moneda">tipo_moneda</label><br>
		<input type="text" value="{{old('tipo_moneda')}}" name="tipo_moneda" placeholder="tipo moneda" id="tipo_moneda"><br>
		<label for="estado">estado</label><br>
		<input type="text" value="{{old('estado')}}" name="estado" placeholder="estado" id="estado"><br>
		<label for="ciudad">ciudad</label><br>
		<input type="text" value="{{old('ciudad')}}" name="ciudad" placeholder="ciudad" id="ciudad"><br>
		<label for="telefono">telefono</label><br>
		<input type="text" value="{{old('telefono')}}" name="telefono" placeholder="telefono" id="telefono"><br>
		<button type="submit">Aceptar</button>
    </form>
 </div>
 @endsection