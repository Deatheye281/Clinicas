@extends('layouts.layout')

@section('titulo')
Laboratorio
@endsection

@section('contenido')
@include('laboratorio.modal')
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
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th> 
                <th>Funciones</th>               
            <tr>
        </thead>
        <tbody>
            @foreach ($laboratorios as $laboratorio)
            <tr>
                <td>{{$laboratorio -> nombre}}</td>
                <td>{{$laboratorio -> direccion}}</td>
                <td>{{$laboratorio -> telefono}}</td>
                <td>
                    <form action="{{route('laboratorio.destroy', $laboratorio->id)}}" method="post">
                    <a href="{{route('laboratorio.show', $laboratorio->id)}}" class="btn btn-info">Ver</a>
                    {{--<a href="{{route('laboratorio.edit', $laboratorio->id)}}" class="btn btn-primary">Editar</a>--}}
                    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalEditar" value="{{$laboratorio->id}}" onclick="mostrar(this)">
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
        <a href="{{route('laboratorio.create')}} "><button class="btn btn-success">Crear laboratorio</button></a>
    </div>
    <script>
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
    </script>
@endsection

