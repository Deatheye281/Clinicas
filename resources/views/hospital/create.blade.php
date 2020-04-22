@extends('layouts.layout')
@section('titulo')
Crear nuevo hospital
@endsection

@section('contenido')
<h1 class="text-center">Crear Nuevo Hospital</h1>
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

<form action="{{route('hospital.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre del Hospital:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion del hospital:</label>
        <input type="text" class="form-control" name="direccion" placeholder="" id="direccion">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Telefono del hospital:</label>
        <input type="number" class="form-control" name="telefono" placeholder="0" id="telefono">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Cantidad de camas:</label>
        <input type="number" class="form-control" name="camas" placeholder="0" id="camas">
        </div>
    </div>
    <div class="form-row">        
        <a href="#" class="btn btn-primary" id="registro">Crear hospital</a>
    </div>
    </form>
    <br>
    <a href="{{route('hospital.index')}}"><button class="btn btn-primary">Volver</button></a>
    <script>
        $('#registro').click(function(){
            var datos = $('#formulario').serialize();
            var ruta = 'guardar';
        
            $.ajax({
                data: datos,
                url: ruta,
                type: 'POST',
                dataType: 'json',
                success: function() {
                    alert('Datos guardados');
                    $('#nombre').val('');
                    $('#direccion').val('');
                    $('#telefono').val('');
                    $('#camas').val('');
                }
            });
        });
    </script>
@endsection