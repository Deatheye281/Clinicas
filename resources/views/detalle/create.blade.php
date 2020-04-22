@extends('layouts.layout')
@section('titulo')
Crear nueva informacion
@endsection

@section('contenido')
<h1 class="text-center">Crear Nueva informacion</h1>
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

<form action="{{route('detalle.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Descripcion:</label>
        <input type="text" class="form-control" name="descripcion" placeholder="" id="descripcion">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha:</label>
        <input type="date" class="form-control" name="fecha" placeholder="" id="fecha">
        </div>
    </div>  
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Hospital asignado:</label>
            <select name="idhospital" class="form-control" id="idhospital">
                @foreach ($hospitales as $hospital)
                    <option value="{{$hospital->id}}">{{$hospital->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Laboratorio asignado:</label>
            <select name="idlaboratorio" class="form-control" id="idlaboratorio">
                @foreach ($laboratorios as $laboratorio)
                    <option value="{{$laboratorio->id}}">{{$laboratorio->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <a href="#" class="btn btn-primary" id="registro">Crear informacion</a>
    </div>
    </form>
    <script>
        $('#registro').click(function(){
            var datos = $('#formulario').serialize();
            var ruta = 'guardar';
        });

        $.ajax({
            data: datos,
            url: ruta,
            type: 'POST',
            dataType: 'json',
            success: function() {
                alert('Datos guardados');
                $('#descripcion').val('');
                $('#fecha').val('');
                $('#idhospital').val('');
                $('#idlaboratorio').val('');               
            }
        });
    </script>
@endsection