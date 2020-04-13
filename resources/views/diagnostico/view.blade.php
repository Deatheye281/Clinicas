@extends('layouts.layout')

@section('titulo')
    Detalle del diagnostico    
@endsection

@section('contenido')
<h1 class="text-center">Detalle del diagnostico</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Tipo de diagnostico: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$diagnostico->tipo}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Complicacion: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$diagnostico->complicacion}}</p>
    </div>       
</div>
<br><br>

<div class="row">
    <a href="{{route('diagnostico.index')}}"><button class="btn btn-primary">Volver</button>
</div>
@endsection
