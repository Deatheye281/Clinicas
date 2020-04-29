@extends('layouts.layout')

@section('titulo')
Fecha de diagnostico
@endsection

@section('contenido')
{{--@include('fechadia.modal')--}}
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
                <th class="text-center">ID Diagnostico</th>
                <th class="text-center">ID Paciente</th>              
                <th class="text-center">Fecha</th>
                <th class="text-center">Funciones</th>                
            <tr>
        </thead>
        <tbody id="tablaDatos">
            @foreach ($fechadias as $fechadia)
            <tr class="text-center">                
                <td class="text-center">{{$fechadia -> iddiagnostico}}</td>                
                <td class="text-center">{{$fechadia -> idpaciente}}</td>                
                <td class="text-center">{{$fechadia -> fecha}}</td>                
                <td class="text-center">
                    <form action="{{route('fechadia.destroy', $fechadia->id)}}" method="post">
                    <a href="{{route('fechadia.show', $fechadia->id)}}" class="btn btn-info">Ver</a>
                    @can('editar-fechadia')
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" value="{{$fechadia->id}}" onclick="mostrar(this)">
                        Editar
                    </button>--}}
                    <a href="{{route('fechadia.edit', $fechadia->id)}}" class="btn btn-primary">Editar</a>
                    @endcan                    
                    @can('eliminar-fechadia')
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
            <li><h5>Crear una nueva fecha de diagnositico</h5>
            <a href="{{route('fechadia.create')}} "><button class="btn btn-success">Crear fecha de diagnostico</button></a>
            <li><h5>Crear un nuevo paciente</h5>
                <a href="{{route('paciente.index')}} "><button class="btn btn-success">Crear paciente</button></a>
            <li><h5>Crear un nuevo diagnostico</h5>
                <a href="{{route('diagnostico.index')}} "><button class="btn btn-success">Crear diagnostico</button></a>
            <li><h5>Home</h5>
                <a href="{{route('inicio')}}"><button class="btn btn-primary">Volver</button></a></li>
        </ul>
    </div>
   
    {{--<script>
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
    </script>--}}
@endsection
