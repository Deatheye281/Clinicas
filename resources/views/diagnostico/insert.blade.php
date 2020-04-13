@extends('layouts.layout')
@section('titulo')
Crear nuevo diagnostico
@endsection

@section('contenido')
<h1 class="text-center">Crear Nuevo Diagnostico</h1>
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

<form action="{{route('diagnostico.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Tipo de diagnostico:</label>
        <input type="text" class="form-control" name="tipo" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Complicacion:</label>
        <input type="text" class="form-control" name="complicacion" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear diagnostico</button>
    </div>
    </form>
@endsection