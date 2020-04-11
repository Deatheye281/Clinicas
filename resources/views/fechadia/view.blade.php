@extends('layouts.layout')

@section('titulo')
    Ver fecha de diagnostico    
@endsection

@section('contenido')
<h1 class="text-center">Ver fecha de diagnostico</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Diagnostico asignado: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$fechadia->diagnostico}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Paciente asignado: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$fechadia->paciente}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Fecha: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$fechadia->fecha}}</p>
    </div>             
</div>
<br><br>

<div class="row">
    <a href="{{route('fechadia.index')}}"><button class="btn btn-primary">Volver</button>
</div>
@endsection