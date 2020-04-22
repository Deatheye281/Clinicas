@extends('layouts.layout')
@section('titulo')
Crear nueva sala
@endsection

@section('contenido')
<h1 class="text-center">Crear Nueva sala</h1>
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

<form action="{{route('sala.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre de la sala:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Cantidad de camas:</label>
        <input type="text" class="form-control" name="c_camas" placeholder="" id="c_camas">
        </div>
    </div>    
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>ID hospital:</label>
            <select name="idhospital" class="form-control" id="idhospital">
                @foreach ($hospitales as $hospital)
                    <option value="{{$hospital->id}}">{{$hospital->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <a href="#" class="btn btn-primary" id="registro">Crear Sala</a>
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
                    $('#c_camas').val('');
                    $('#idhospital').val('');                    
                }
            });
        });
    </script>
@endsection