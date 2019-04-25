@extends('layouts.app')

@section('content')
<div class="container">
    <h1>EMPRESARIOS</h1>
    <br>
    <div class="text-right" style="text-align: right;">
        <a href="{{url('empresarios/create')}}" class="btn btn-primary">Agregar</a>
        <br>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>codigo</th>
                    <th>razonsocial</th>
                    <th>nombre</th>
                    <th>pais</th>
                    <th>tipo_moneda</th>
                    <th>estado</th>
                    <th>ciudad</th>
                    <th>telefono</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresarios as $empresario)
                    <tr>
                        <th>{{$empresario->id}}</th>
                        <th>{{$empresario->codigo}}</th>
                        <th>{{$empresario->razonsocial}}</th>
                        <th>{{$empresario->nombre}}</th>
                        <th>{{$empresario->pais}}</th>
                        <th>{{$empresario->tipo_moneda}}</th>
                        <th>{{$empresario->estado}}</th>
                        <th>{{$empresario->ciudad}}</th>
                        <th>{{$empresario->telefono}}</th>
                        <th width="15%">
                            <a href="{{url('empresarios').'/'.$empresario->id.'/edit'}}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{url('empresarios').'/'.$empresario->id}}" method="POST" style="display: inline-block;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
@endsection