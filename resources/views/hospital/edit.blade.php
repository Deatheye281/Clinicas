@extends('layouts.layout')

@section('titulo','Actualizar hospital')
 
@section('contenido')

<h1 class="text-center">Editar Hospital</h1>
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

<form action="{{route('hospital.update', $hospital->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
            <div class="form-group col-md-6">
            <label>Nombre del hospital:</label>
            <input type="text" class="form-control" name="nombre" value="{{$hospital->nombre}}">
            </div>
        </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion:</label>
        <input type="text" class="form-control" name="direccion" value="{{$hospital->direccion}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Telefono:</label>
        <input type="number" class="form-control" name="telefono" value="{{$hospital->telefono}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Cantidad de camas:</label>
        <input type="number" class="form-control" name="camas" value="{{$hospital->camas}}">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar Hospital</button>
    </div>
    </form>
    <br>
    <a href="{{route('hospital.index')}}"><button class="btn btn-primary">Volver</button></a>
@endsection