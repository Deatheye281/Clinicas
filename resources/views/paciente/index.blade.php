@extends('layouts.layout')

@section('titulo')
Paciente
@endsection

@section('contenido')
@include('paciente.modal')
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
                <th>Sala asignada</th>
                <th>Nombre</th>
                <th>Numero de registro</th>
                <th>Numero de cama</th>
                <th>Direccion</th>
                <th>Fecha de nacimiento</th>
                <th>Sexo</th>
                <th>Funciones</th> 
            <tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)                
            <tr>                               
                <td>{{$paciente -> idsala}}</td>                
                <td>{{$paciente -> nombre}}</td>
                <td>{{$paciente -> N_registro}}</td> 
                <td>{{$paciente -> N_cama}}</td>
                <td>{{$paciente -> direccion}}</td>
                <td>{{$paciente -> F_nacimiento}}</td>
                <td>{{$paciente -> sexo}}</td>
                <td>
                    <form action="{{route('paciente.destroy', $paciente->id)}}" method="post">
                    <a href="{{route('paciente.show', $paciente->id)}}" class="btn btn-info">Ver</a>
                    {{--<a href="{{route('paciente.edit', $paciente->id)}}" class="btn btn-primary">Editar</a>--}}
                    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalEditar" value="{{$paciente->id}}" onclick="mostrar(this)">
                        Editar
                    </button>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            <tr>                  
            @endforeach
        </tbody>
    </table>
    <br><br>

    <div class="row">
        <a href="{{route('paciente.create')}} "><button class="btn btn-success">Crear paciente</button></a>
        <a href="{{route('diagnostico.index')}}"><button class="btn btn-success">Diagnosticar paciente</button></a>
    </div>

    <script>
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
    </script>
@endsection
