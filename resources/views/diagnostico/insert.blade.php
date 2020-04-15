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
        <select name="tipo" class="form-control">            
            <option value="Diagnostico diferencial">Diagnostico diferencial</option>
            <option value="Diagnostico precoz">Diagnostico precoz</option>
            <option value="Diagnostico por comparacion">Diagnostico por comparacion</option>
            <option value="Diagnostico por intuicion">Diagnostico por intuicion</option>
            <option value="Diagnostico por hipotesis">Diagnostico por hipotesis</option>
            <option value="Rayos X">Rayos X</option>
            <option value="Biopsia">Biopsia</option>                  
        </select>
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