@extends('layouts.layout')
@section('titulo')
Crear nueva consulta
@endsection

@section('contenido')
<h1 class="text-center">Crear Nueva consulta</h1>
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

<form action="{{route('consulta.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha:</label>
        <input type="date" class="form-control" name="fecha" placeholder="" id="fecha">
        </div>
    </div>  
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Medico asignado:</label>
            <select name="idmedico" class="form-control" id="idmedico">
                @foreach ($medicos as $medico)
                    <option value="{{$medico->id}}">{{$medico->nombre}}</option>
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
        <a href="#" class="btn btn-primary" id="registro">Crear informacion</a>
    </div>
    </form>
    <br>
    <a href="{{route('diagnostico.index')}}"><button class="btn btn-primary">Volver</button></a>
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
                $('#idmedico').val('');
                $('#idpaciente').val('');               
            }
        });
    </script>
@endsection