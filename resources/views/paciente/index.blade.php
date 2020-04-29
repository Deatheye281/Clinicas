@extends('layouts.layout')

@section('titulo')
Paciente
@endsection

@section('contenido')
{{--@include('paciente.modal')--}}
<h1 class="text-center">Paciente</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">ID Sala</th>
                <th class="text-center">Nombre</th>                   
                <th class="text-center">Direccion</th>                          
                <th class="text-center">Sexo</th>
                <th class="text-center">Funciones</th> 
            <tr>
        </thead>
        <tbody id="tablaDatos">
            @foreach ($pacientes as $paciente)                
            <tr class="text-center">                               
                <td class="text-center">{{$paciente -> idsala}}</td>                       
                <td class="text-center">{{$paciente -> nombre}}</td>                
                <td class="text-center">{{$paciente -> direccion}}</td>                
                <td class="text-center">{{$paciente -> sexo}}</td>
                <td class="text-center">
                    <form action="{{route('paciente.destroy', $paciente->id)}}" method="post">
                    <a href="{{route('paciente.show', $paciente->id)}}" class="btn btn-info">Ver</a>                    
                    @can('editar-paciente')
                    <a href="{{route('paciente.edit', $paciente->id)}}" class="btn btn-primary">Editar</a>
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" value="{{$paciente->id}}" onclick="mostrar(this)">
                        Editar
                    </button>--}}
                    @endcan
                    @can('eliminar-paciente')
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    @endcan
                    </form>
                </td>
            <tr>                  
            @endforeach
        </tbody>
    </table>
    <br><br>

    <div class="row">
        <ul>
        <li><h5>Crear un nuevo paciente</h5>
        <a href="{{route('paciente.create')}}"><button class="btn btn-success">Crear Paciente</button></a> </li>

       <li><h5>Crear un nuevo diagnostico</h5>
        <a href="{{route('diagnostico.index')}}"><button class="btn btn-success">Crear Diagnostico</button></a> </li>
    
        <li><h5>Home</h5>
        <a href="{{route('inicio')}}"><button class="btn btn-primary">Volver</button></a></li>
        </ul>        
    </div>

    {{--<script>
        function mostrar(btn){
            var ruta = "paciente/" + btn.value + "/edit";
            $.get(ruta, function(respuesta){
                $('#N_registro').val(respuesta[0].N_registro);
                $('#N_cama').val(respuesta[0].N_cama);
                $('#nombre').val(respuesta[0].nombre);
                $('#direccion').val(respuesta[0].direccion);                
                $('#F_nacimiento').val(respuesta[0].F_nacimiento);
                $('#sexo').val(respuesta[0].sexo);
                $('#idsala').val(respuesta[0].idsala);
                $('#id').val(respuesta[0].id);
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'paciente/' + id;

            $.ajax({
                data: datos,
                url: ruta,
                type: 'PUT',
                dataType: 'json',
                success: function() {
                    alert('Datos modificados');
                    cargarDatos();
                }
            });
        });
        function cargarDatos(){
            var tabla = $('#tablaDatos');
            var ruta = 'pacientes';

            tabla.empty();

            $.get(ruta, function(respuesta){
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.N_registro + "</td><td>" + element.N_cama + "</td><td>" + element.nombre + "</td><td>" + element.direccion + "</td><td>" + element.F_nacimiento + "</td><td>" + element.sexo + "</td><td>" + element.idsala + "</td><td><button class='btn btn-info'>Ver</button><button class='btn btn-success'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });
        }
    </script>--}}
@endsection
