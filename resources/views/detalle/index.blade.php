@extends('layouts.layout')

@section('titulo')
Informacion
@endsection

@section('contenido')
{{--@include('detalle.modal')--}}
<h1 class="text-center">Informacion</h1>
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
                <th class="text-center">ID Laboratorio</th>                
                <th class="text-center">Descripcion</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Funciones</th>                
            <tr>
        </thead>
        <tbody id="tablaDatos">
            @foreach ($detalles as $detalle)
            <tr class="text-center">
                <td class="text-center">{{$detalle -> idhospital}}</td>                
                <td class="text-center">{{$detalle -> idlaboratorio}}</td>
                <td class="text-center">{{$detalle -> descripcion}}</td> 
                <td class="text-center">{{$detalle -> fecha}}</td>                
                <td class="text-center">
                    <form action="{{route('detalle.destroy', $detalle->id)}}" method="post">
                    <a href="{{route('detalle.show', $detalle->id)}}" class="btn btn-info">Ver</a>
                    @can('editar-detalle')
                    <a href="{{route('detalle.edit', $detalle->id)}}" class="btn btn-primary">Editar</a>
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" value="{{$detalle->id}}" onclick="mostrar(this)">
                        Editar
                    </button>--}}
                    @endcan                    
                    @can('eliminar-detalle')
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
        <ul><li><h5>Crear un nuevo detalle</h5>
            <a href="{{route('detalle.create')}} "><button class="btn btn-success">Crear informacion</button></a>
        <li><h5>Home</h5>
                <a href="{{route('inicio')}}"><button class="btn btn-primary">Volver</button></a></li>
        </ul>
    </div>
    {{--<script>
        function mostrar(btn){
            var ruta = "detalle/" + btn.value + "/edit";
            $.get(ruta, function(respuesta){
                $('#descripcion').val(respuesta[0].descripcion);
                $('#fecha').val(respuesta[0].fecha);
                $('#idhospital').val(respuesta[0].idhospital);
                $('#idlaboratorio').val(respuesta[0].idlaboratorio);                
                $('#id').val(respuesta[0].id);
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'detalle/' + id;

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
            var ruta = 'detalles';

            tabla.empty();

            $.get(ruta, function(respuesta){
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.descripcion + "</td><td>" + element.fecha + "</td><td>" + element.idhospital + "</td><td>" + element.idlaboratorio + "</td><td><button class='btn btn-info'>Ver</button><button class='btn btn-success'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });
        }
    </script>--}}
@endsection
