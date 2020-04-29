@extends('layouts.layout')

@section('titulo')
Laboratorio
@endsection

@section('contenido')
{{--@include('laboratorio.modal')--}}
<h1 class="text-center">Laboratorio</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Direccion</th>
                <th class="text-center">Telefono</th> 
                <th class="text-center">Funciones</th>               
            <tr>
        </thead>
        <tbody id="tablaDatos">
            @foreach ($laboratorios as $laboratorio)
            <tr>
                <td class="text-center">{{$laboratorio -> nombre}}</td>
                <td class="text-center">{{$laboratorio -> direccion}}</td>
                <td class="text-center">{{$laboratorio -> telefono}}</td>
                <td class="text-center">
                    <form action="{{route('laboratorio.destroy', $laboratorio->id)}}" method="post"> 
                    <a href="{{route('laboratorio.show', $laboratorio->id)}}" class="btn btn-info">Ver</a>                    
                    @can('editar-laboratorio')
                    <a href="{{route('laboratorio.edit', $laboratorio->id)}}" class="btn btn-primary">Editar</a>
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" value="{{$laboratorio->id}}" onclick="mostrar(this)">Editar</button>--}}
                    @endcan
                    @can('eliminar-laboratorio')
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
    <ul><li><h5>Crear laboratorio</h5>
        <a href="{{route('laboratorio.create')}} "><button class="btn btn-success">Crear laboratorio</button></a>
    <li><h5>Home</h5>
        <a href="{{route('inicio')}}"><button class="btn btn-primary">Volver</button></a></li>
    </ul>
    </div>
    {{--<script>
        function mostrar(btn){
            var ruta = "laboratorio/" + btn.value + "/edit";
            $.get(ruta, function(respuesta){
                $('#nombre').val(respuesta[0].nombre);
                $('#direccion').val(respuesta[0].direccion);
                $('#telefono').val(respuesta[0].telefono);                
                $('#id').val(respuesta[0].id);
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'laboratorio/' + id;

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
            var ruta = 'laboratorios';

            tabla.empty();

            $.get(ruta, function(respuesta){
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.nombre + "</td><td>" + element.direccion + "</td><td>" + element.telefono + "</td><td><button class='btn btn-info'>Ver</button><button class='btn btn-success'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });
        }
    </script>--}}
@endsection

