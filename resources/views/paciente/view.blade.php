@extends('layouts.layout')

@section('titulo')
    Detalle del paciente    
@endsection

@section('contenido')
<h1 class="text-center">Detalle del paciente</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Sala asignada: </h3>
    </div>
    <div class="col-sm-3">                  
        <p class="lead">{{$paciente->sala}}</p>           
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Nombre: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->nombre}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Numero de registro: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->N_registro}}</p>
    </div>             
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Numero de camas: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->N_cama}}</p>
    </div>             
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Direccion: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->direccion}}</p>
    </div>             
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Fecha de nacimiento: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->F_nacimiento}}</p>
    </div>             
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Sexo: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->sexo}}</p>
    </div>             
</div>
<br><br>

<div class="row">
    <a href="{{route('paciente.index')}}"><button class="btn btn-primary">Volver</button>
</div>
@endsection