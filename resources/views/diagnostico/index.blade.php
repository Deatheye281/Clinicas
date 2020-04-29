@extends('layouts.layout')

@section('titulo')
Diagnostico
@endsection

@section('contenido')
{{--@include('diagnostico.modal')--}}
<h1 class="text-center">Diagnostico</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Tipo</th>
                <th class="text-center">Complicacion</th>
                <th class="text-center">Funciones</th>                
            <tr>
        </thead>
        <tbody id="tablaDatos">
            @foreach ($diagnosticos as $diagnostico)
            <tr class="text-center">
                <td class="text-center">{{$diagnostico -> tipo}}</td>
                <td class="text-center">{{$diagnostico -> complicacion}}</td>                
                <td class="text-center">
                    <form action="{{route('diagnostico.destroy', $diagnostico->id)}}" method="post">
                    <a href="{{route('diagnostico.show', $diagnostico->id)}}" class="btn btn-info">Ver</a>
                    @can('editar-diagnostico')
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" value="{{$diagnostico->id}}" onclick="mostrar(this)">
                        Editar
                    </button>--}}
                    <a href="{{route('diagnostico.edit', $diagnostico->id)}}" class="btn btn-primary">Editar</a>
                    @endcan
                    
                    @can('eliminar-diagnostico')
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
            <li><h5>Crear un nuevo diagnostico</h5>
            <a href="{{route('diagnostico.create')}} "><button class="btn btn-success">Crear diagnostico</button></a>
        <li><h5>Home</h5>
                <a href="{{route('inicio')}}"><button class="btn btn-primary">Volver</button></a></li>
        </ul>
    </div>

    {{--<script>
        function mostrar(btn){
            var ruta = "diagnostico/" + btn.value + "/edit";
            $.get(ruta, function(respuesta){
                $('#tipo').val(respuesta[0].tipo);
                $('#complicacion').val(respuesta[0].complicacion);                
                $('#id').val(respuesta[0].id);
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'diagnostico/' + id;

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
            var ruta = 'diagnosticos';

            tabla.empty();

            $.get(ruta, function(respuesta){
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.tipo + "</td><td>" + element.complicacion + "</td><td><button class='btn btn-info'>Ver</button><button class='btn btn-success'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });
        }
    </script>--}}
@endsection

