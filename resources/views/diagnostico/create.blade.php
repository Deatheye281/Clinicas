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

<form action="{{route('diagnostico.store')}}" method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Tipo de diagnostico:</label>
        <select name="tipo" class="form-control" id="tipo">            
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
        <input type="text" class="form-control" name="complicacion" placeholder="" id="complicacion">
        </div>
    </div>
    <div class="form-row">
        <a href="#" class="btn btn-primary" id="registro">Crear diagnostico</a>
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
                    $('#tipo').val('');
                    $('#complicacion').val('');               
                }
            });
        });
    </script>
@endsection