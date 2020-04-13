@extends('layouts.layout')

@section('titulo','Actualizar diagnostico')
 
@section('contenido')

<h1 class="text-center">Editar Diagnostico</h1>
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

<form action="{{route('diagnostico.update', $diagnostico->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
            <div class="form-group col-md-6">
            <label>Tipo de Diagnostico:</label>
            <input type="text" class="form-control" name="tipo" value="{{$diagnostico->tipo}}">
            </div>
        </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Complicacion del diagnostico:</label>
        <input type="text" class="form-control" name="complicacion" value="{{$diagnostico->complicacion}}">
        </div>
    </div>   
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar Diagnostico</button>
    </div>
    </form>

@endsection