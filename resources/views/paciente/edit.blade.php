@extends('layouts.layout')

@section('titulo','Actualizar paciente')
 
@section('contenido')

<h1 class="text-center">Editar paciente</h1>
<br><br>

@if($errors->any())
	<div class="alert alert-danger">
	<div class="header"> <strong>Ups.</strong> Algo anda mal...</div>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
	</div>
	
@endif

<form action="{{route('paciente.update', $paciente->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
            <div class="form-group col-md-6">
            <label>Numero del registro:</label>
            <input type="number" class="form-control" name="N_registro" value="{{$paciente->N_registro}}">
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero de cama:</label>
        <input type="number" class="form-control" name="N_cama" value="{{$paciente->N_cama}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre:</label>
        <input type="text" class="form-control" name="nombre" value="{{$paciente->nombre}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion:</label>
        <input type="text" class="form-control" name="direccion" value="{{$paciente->direccion}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha de nacimiento:</label>
        <input type="date" class="form-control" name="F_nacimiento" value="{{$paciente->F_nacimiento}}">
        </div>
    </div>  
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Sexo:</label>
        <select name="sexo" class="form-control">            
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>            
        </select>
        </div>
    </div>            
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Sala asignada:</label>
            <select name="idsala" class="form-control">
                @foreach ($salas as $sala)
                    <option value="{{$sala->id}}"
                    @if ($paciente -> $sala == $sala->id)
                        selected
                    @endif>
                    {{$sala->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar paciente</button>
    </div>
    </form>

@endsection