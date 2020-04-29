@extends('layouts.layout')

@section('titulo')
Sala
@endsection

@section('contenido')
{{--@include('sala.modal')--}}
<h1 class="text-center">Sala</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">ID Hospital</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Cantidad de camas</th>
                <th class="text-center">Funciones</th>                
            <tr>
        </thead>
        <tbody id="tablaDatos">
            @foreach ($salas as $sala)
            <tr class="text-center">                             
                <td class="text-center">{{$sala -> idhospital}}</td>           
                <td class="text-center">{{$sala -> nombre}}</td>
                <td class="text-center">{{$sala -> c_camas}}</td>                
                <td class="text-center">
                    <form action="{{route('sala.destroy', $sala->id)}}" method="post">
                    <a href="{{route('sala.show', $sala->id)}}" class="btn btn-info">Ver</a>                   
                    @can('editar-sala')
                    <a href="{{route('sala.edit', $sala->id)}}" class="btn btn-primary">Editar</a>
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" value="{{$sala->id}}" onclick="mostrar(this)">
                        Editar
                    </button>--}}
                    @endcan
                    @can('eliminar-sala')
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
        <li><h5>Crear una nueva sala</h5>
        <a href="{{route('sala.create')}}"><button class="btn btn-success">Crear Sala</button></a> </li>

       <li><h5>Crear nuevo paciente</h5>
        <a href="{{route('paciente.index')}}"><button class="btn btn-success">Crear Paciente</button></a> </li>
    
        <li><h5>Home</h5>
        <a href="{{route('inicio')}}"><button class="btn btn-primary">Volver</button></a></li>
        </ul>        
    </div>

    {{--<script>
        function mostrar(btn){
            var ruta = "sala/" + btn.value + "/edit";
            $.get(ruta, function(respuesta){
                $('#nombre').val(respuesta[0].nombre);
                $('#c_camas').val(respuesta[0].c_camas);
                $('#idhospital').val(respuesta[0].idhospital);                
                $('#id').val(respuesta[0].id);
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'sala/' + id;

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
            var ruta = 'salas';

            tabla.empty();

            $.get(ruta, function(respuesta){
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.nombre + "</td><td>" + element.c_camas + "</td><td>" + element.idhospital + "</td><td><button class='btn btn-info'>Ver</button><button class='btn btn-success'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });
        }
    </script>--}}
@endsection
