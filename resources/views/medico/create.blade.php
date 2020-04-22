@extends('layouts.layout')
@section('titulo')
Crear nuevo medico
@endsection

@section('contenido')
<h1 class="text-center">Crear Nuevo medico</h1>
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

<form action="{{route('medico.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre del medico:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Especialidad:</label>
        <input type="text" class="form-control" name="especialidad" placeholder="" id="especialidad">
        </div>
    </div>    
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre del Hospital:</label>
            <select name="idhospital" class="form-control" id="idhospital">
                @foreach ($hospitales as $hospital)
                    <option value="{{$hospital->id}}">{{$hospital->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <a href="#" class="btn btn-primary" id="registro">Crear Medico</a>
    </div>
    </form>
    <br>
    <a href="{{route('medico.index')}}"><button class="btn btn-primary">Volver</button></a>
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
                    $('#especialidad').val('');
                    $('#idhospital').val('');                    
                }
            });
        });
    </script>
@endsection