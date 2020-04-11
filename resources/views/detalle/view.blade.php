@extends('layouts.layout')

@section('titulo')
    Detalle    
@endsection

@section('contenido')
<h1 class="text-center">Detalle</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Hospital asignado: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$detalle->hospital}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Laboratorio asignado: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$detalle->laboratorio}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Descripcion: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$detalle->descripcion}}</p>
    </div>             
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Fecha: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$detalle->fecha}}</p>
    </div>             
</div>
<br><br>

<div class="row">
    <a href="{{route('detalle.index')}}"><button class="btn btn-primary">Volver</button>
</div>
@endsection