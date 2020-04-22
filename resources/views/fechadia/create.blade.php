@extends('layouts.layout')
@section('titulo')
Crear nueva fecha de diagnostico
@endsection

@section('contenido')
<h1 class="text-center">Crear Nueva fecha de diagnostico</h1>
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

<form action="{{route('fechadia.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha:</label>
        <input type="date" class="form-control" name="fecha" placeholder="" id="fecha">
        </div>
    </div>  
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Diagnostico asignado:</label>
            <select name="iddiagnostico" class="form-control" id="iddiagnostico">
                @foreach ($diagnosticos as $diagnostico)
                    <option value="{{$diagnostico->id}}">{{$diagnostico->tipo}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Paciente asignado:</label>
            <select name="idpaciente" class="form-control" id="idpaciente">
                @foreach ($pacientes as $paciente)
                    <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <a href="#" class="btn btn-primary" id="registro">Crear fecha de diagnostico</a>
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
                $('#fecha').val('');
                $('#iddiagonostico').val('');
                $('#idpaciente').val('');               
            }
        });
    </script>
@endsection