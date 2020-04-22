@extends('layouts.layout')

@section('titulo')
Fecha de diagnostico
@endsection

@section('contenido')
@include('fechadia.modal')
<h1 class="text-center">Fecha de diagnostico</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Diagnostico asignado</th>
                <th>Paciente asignado</th>              
                <th>Fecha</th>
                <th>Funciones</th>                
            <tr>
        </thead>
        <tbody>
            @foreach ($fechadias as $fechadia)
            <tr>                
                <td>{{$fechadia -> iddiagnostico}}</td>                
                <td>{{$fechadia -> idpaciente}}</td>                
                <td>{{$fechadia -> fecha}}</td>                
                <td>
                    <form action="{{route('fechadia.destroy', $fechadia->id)}}" method="post">
                    <a href="{{route('fechadia.show', $fechadia->id)}}" class="btn btn-info">Ver</a>
                    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalEditar" value="{{$fechadia->id}}" onclick="mostrar(this)">
                        Editar
                    </button>
                    {{--<a href="{{route('fechadia.edit', $fechadia->id)}}" class="btn btn-primary">Editar</a>--}}
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
        <a href="{{route('fechadia.create')}} "><button class="btn btn-success">Crear fecha de diagnostico</button></a>
    </div>
    <script>
        function mostrar(btn){
            var ruta = "fechadia/" + btn.value + "/edit";
            $.get(ruta, function(respuesta){
                $('#fecha').val(respuesta[0].fecha);
                $('#iddiagnostico').val(respuesta[0].iddiagnostico);
                $('#idpaciente').val(respuesta[0].idpaciente);                
                $('#id').val(respuesta[0].id);
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'fechadia/' + id;

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
            var ruta = 'fechadias';

            tabla.empty();

            $.get(ruta, function(respuesta){
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.fecha + "</td><td>" + element.iddiagnostico + "</td><td>" + element.idpaciente + "</td><td><button class='btn btn-info'>Ver</button><button class='btn btn-success'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });
        }
    </script>
@endsection
