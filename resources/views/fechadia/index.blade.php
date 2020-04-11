@extends('layouts.layout')

@section('titulo')
Fecha de diagnostico
@endsection

@section('contenido')
<h1 class="text-center">Fecha de diagnostico</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Diagnostico asignado</th>
                <th>Paciente asignado</th>              
                <th>Fecha</th>
                <th>Funciones</th>                
            <tr>
        </thead>
        <tbody>
            @foreach ($fechadias as $fechadia)
            <tr>                
                <td>{{$fechadia -> iddiagnostico}}</td>                
                <td>{{$fechadia -> idpaciente}}</td>                
                <td>{{$fechadia -> fecha}}</td>                
                <td>
                    <form action="{{route('fechadia.destroy', $fechadia->id)}}" method="post">
                    <a href="{{route('fechadia.show', $fechadia->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('fechadia.edit', $fechadia->id)}}" class="btn btn-primary">Editar</a>
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
        <a href="{{route('fechadia.create')}} "><button class="btn btn-success">Crear fecha de diagnostico</button></a>
    </div>
@endsection
