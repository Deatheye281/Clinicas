@extends('layouts.layout')

@section('titulo')
    Detalle del hospital    
@endsection

@section('contenido')
<h1 class="text-center">Detalle del hospital</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Nombre del hospital: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$hospital->nombre}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Direccion del hospital: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$hospital->direccion}}</p>
    </div>       
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Telefono del hospital: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$hospital->telefono}}</p>
    </div>       
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Cantidad de camas: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$hospital->camas}}</p>
    </div>       
</div>
<br><br>

<div class="row">
    <a href="{{route('hospital.index')}}"><button class="btn btn-primary">Volver</button>
</div>
@endsection
