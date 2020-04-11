@extends('layouts.layout')

@section('titulo')
Paciente
@endsection

@section('contenido')
<h1 class="text-center">Paciente</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sala asignada</th>
                <th>Nombre</th>
                <th>Numero de registro</th>
                <th>Numero de cama</th>
                <th>Direccion</th>
                <th>Fecha de nacimiento</th>
                <th>Sexo</th>
                <th>Funciones</th> 
            <tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)                
            <tr>                               
                <td>{{$paciente -> idsala}}</td>                
                <td>{{$paciente -> nombre}}</td>
                <td>{{$paciente -> N_registro}}</td> 
                <td>{{$paciente -> N_cama}}</td>
                <td>{{$paciente -> direccion}}</td>
                <td>{{$paciente -> F_nacimiento}}</td>
                <td>{{$paciente -> sexo}}</td>
                <td>
                    <form action="{{route('paciente.destroy', $paciente->id)}}" method="post">
                    <a href="{{route('paciente.show', $paciente->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('paciente.edit', $paciente->id)}}" class="btn btn-primary">Editar</a>
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
        <a href="{{route('paciente.create')}} "><button class="btn btn-success">Crear paciente</button></a>
        <a href="{{route('diagnostico.index')}}"><button class="btn btn-success">Diagnosticar paciente</button></a>
    </div>
@endsection
