@extends('layouts.layout')
@section('titulo')
Crear nuevo paciente
@endsection

@section('contenido')
<h1 class="text-center">Crear Nuevo paciente</h1>
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

<form action="{{route('paciente.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero del registro:</label>
        <input type="number" class="form-control" name="N_registro" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero de la cama:</label>
        <select name="N_cama" class="form-control">            
            <option value="A01">A01</option>
            <option value="A02">A02</option>
            <option value="A03">A03</option>
            <option value="A04">A04</option>
            <option value="B01">B01</option>
            <option value="B02">B02</option>
            <option value="B03">B03</option>
            <option value="B04">B04</option>
            <option value="C01">C01</option>
            <option value="C02">C02</option>
            <option value="C03">C03</option>
            <option value="C04">C04</option>
            <option value="D01">D01</option>
            <option value="D02">D02</option> 
            <option value="D03">D03</option>
            <option value="D04">D04</option>           
        </select>
        </div>
    </div>    
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre del paciente:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion:</label>
        <input type="text" class="form-control" name="direccion" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha de nacimiento:</label>
        <input type="date" class="form-control" name="F_nacimiento" placeholder="">
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
                    <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear paciente</button>
    </div>
    </form>
    <br>
    <a href="{{route('paciente.index')}}"><button class="btn btn-primary">Volver</button></a>
@endsection