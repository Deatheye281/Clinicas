@extends('layouts.layout')

@section('titulo')
    Detalle de la sala  
@endsection

@section('contenido')
<h1 class="text-center">Detalle de la sala</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Hospital asignado: </h3>
    </div>
    <div class="col-sm-3">        
        <p class="lead">{{$sala->hospital}}</p>          
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Nombre: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$sala->nombre}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Cantida de camas: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$sala->c_camas}}</p>
    </div>         
</div>
<br><br>

<div class="row">
    <a href="{{route('sala.index')}}"><button class="btn btn-primary">Volver</button>
</div>
@endsection