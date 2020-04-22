@extends('layouts.layout')

@section('titulo')
Sala
@endsection

@section('contenido')
@include('sala.modal')
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
                <th>ID Hospital</th>
                <th>Nombre</th>
                <th>Cantidad de camas</th>
                <th>Funciones</th>                
            <tr>
        </thead>
        <tbody>
            @foreach ($salas as $sala)
            <tr>                             
                <td>{{$sala -> idhospital}}</td>           
                <td>{{$sala -> nombre}}</td>
                <td>{{$sala -> c_camas}}</td>                
                <td>
                    <form action="{{route('sala.destroy', $sala->id)}}" method="post">
                    <a href="{{route('sala.show', $sala->id)}}" class="btn btn-info">Ver</a>
                   {{-- <a href="{{route('sala.edit', $sala->id)}}" class="btn btn-primary">Editar</a>--}}
                    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalEditar" value="{{$sala->id}}" onclick="mostrar(this)">
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
        <a href="{{route('sala.create')}} "><button class="btn btn-success">Crear sala</button></a>
        <a href="{{route('paciente.index')}}"><button class="btn btn-success">Lista de pacientes</button></a>
    </div>

    <script>
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
    </script>
@endsection
