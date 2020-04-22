@extends('layouts.layout')

@section('titulo')
Informacion
@endsection

@section('contenido')
@include('detalle.modal')
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
                <th>Hospital asignado</th>
                <th>Laboratorio asignado</th>                
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Funciones</th>                
            <tr>
        </thead>
        <tbody>
            @foreach ($detalles as $detalle)
            <tr>
                <td>{{$detalle -> idhospital}}</td>                
                <td>{{$detalle -> idlaboratorio}}</td>
                <td>{{$detalle -> descripcion}}</td> 
                <td>{{$detalle -> fecha}}</td>                
                <td>
                    <form action="{{route('detalle.destroy', $detalle->id)}}" method="post">
                    <a href="{{route('detalle.show', $detalle->id)}}" class="btn btn-info">Ver</a>
                    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalEditar" value="{{$detalle->id}}" onclick="mostrar(this)">
                        Editar
                    </button>
                    {{--<a href="{{route('detalle.edit', $detalle->id)}}" class="btn btn-primary">Editar</a>--}}
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
        <a href="{{route('detalle.create')}} "><button class="btn btn-success">Crear informacion</button></a>
    </div>
    <script>
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
    </script>
@endsection
