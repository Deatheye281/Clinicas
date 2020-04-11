@extends('layouts.layout')

@section('titulo')
Informacion
@endsection

@section('contenido')
<h1 class="text-center">Informacion</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hospital asignado</th>
                <th>Laboratorio asignado</th>                
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Funciones</th>                
            <tr>
        </thead>
        <tbody>
            @foreach ($detalles as $detalle)
            <tr>
                <td>{{$detalle -> idhospital}}</td>                
                <td>{{$detalle -> idlaboratorio}}</td>
                <td>{{$detalle -> descripcion}}</td> 
                <td>{{$detalle -> fecha}}</td>                
                <td>
                    <form action="{{route('detalle.destroy', $detalle->id)}}" method="post">
                    <a href="{{route('detalle.show', $detalle->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('detalle.edit', $detalle->id)}}" class="btn btn-primary">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            <tr>  
            @endforeach
        </tbody>
    </table>
    <br><br>

    <div class="row">
        <a href="{{route('detalle.create')}} "><button class="btn btn-success">Crear informacion</button></a>
    </div>
@endsection
