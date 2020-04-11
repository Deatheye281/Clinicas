@extends('layouts.layout')

@section('titulo','Actualizar sala')
 
@section('contenido')

<h1 class="text-center">Editar sala</h1>
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

<form action="{{route('sala.update', $sala->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
            <div class="form-group col-md-6">
            <label>Nombre de la sala:</label>
            <input type="text" class="form-control" name="nombre" value="{{$sala->nombre}}">
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Cantidad de camas:</label>
        <input type="text" class="form-control" name="c_camas" value="{{$sala->c_camas}}">
        </div>
    </div>    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Hospital:</label>
            <select name="idhospital" class="form-control">
                @foreach ($hospitales as $hospital)
                    <option value="{{$hospital->id}}"
                    @if ($sala -> $hospital == $hospital->id)
                        selected
                    @endif>
                    {{$hospital->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar sala</button>
    </div>
    </form>

@endsection