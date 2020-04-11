@extends('layouts.layout')

@section('titulo')
    Ver Consulta    
@endsection

@section('contenido')
<h1 class="text-center">Ver consulta</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Medico asignado: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$consulta->medico}}</p>        
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Paciente asignado: </h3>
    </div>
    <div class="col-sm-3">                     
        <p class="lead">{{$consulta->paciente}}</p>            
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Fecha: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$consulta->fecha}}</p>
    </div>             
</div>
<br><br>

<div class="row">
    <a href="{{route('consulta.index')}}"><button class="btn btn-primary">Volver</button>
</div>
@endsection