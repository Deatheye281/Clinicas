@extends('layouts.layout')
@section('titulo')
Crear nuevo laboratorio
@endsection

@section('contenido')
<h1 class="text-center">Crear Nuevo Laboratorio</h1>
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

<form action="{{route('laboratorio.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre del laboratorio:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion del laboratorio:</label>
        <input type="text" class="form-control" name="direccion" placeholder="0" id="direccion">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Telefono del laboratorio:</label>
        <input type="number" class="form-control" name="telefono" placeholder="0" id="telefono">
        </div>
    </div>
    <div class="form-row">
        <a href="#" class="btn btn-primary" id="registro">Crear laboratorio</a>
    </div>
    </form>
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
                }
            });
        });
    </script>
@endsection