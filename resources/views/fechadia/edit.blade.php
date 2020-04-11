@extends('layouts.layout')

@section('titulo','Actualizar fecha diagnostico')
 
@section('contenido')

<h1 class="text-center">Editar fecha diagnostico</h1>
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

<form action="{{route('fechadia.update', $fechadia->id)}}" method="post">
    @csrf
    @method('PUT')    
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha:</label>
        <input type="date" class="form-control" name="fecha" value="{{$fechadia->fecha}}">
        </div>
    </div>                
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Diagnostico asignado:</label>
            <select name="iddiagnostico" class="form-control">
                @foreach ($diagnosticos as $diagnostico)
                    <option value="{{$diagnostico->id}}"
                    @if ($fechadia -> $diagnostico == $diagnostico->id)
                        selected
                    @endif>
                    {{$diagnostico->tipo}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Paciente asignado:</label>
            <select name="idpaciente" class="form-control">
                @foreach ($pacientes as $paciente)
                    <option value="{{$paciente->id}}"
                    @if ($fechadia -> $paciente == $paciente->id)
                        selected
                    @endif>
                    {{$paciente->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar fecha diagnostico</button>
    </div>
    </form>

@endsection