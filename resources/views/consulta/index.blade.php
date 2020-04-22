@extends('layouts.layout')

@section('titulo')
Consulta
@endsection

@section('contenido')
@include('consulta.modal')
<h1 class="text-center">Consulta</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Medico asignado</th>
                <th>Paciente asignado</th>              
                <th>Fecha</th>
                <th>Funciones</th>                
            <tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
            <tr>                
                <td>{{$consulta -> idmedico}}</td>                
                <td>{{$consulta -> idpaciente}}</td>                                                
                <td>{{$consulta -> fecha}}</td>                
                <td>
                    <form action="{{route('consulta.destroy', $consulta->id)}}" method="post">
                    <a href="{{route('consulta.show', $consulta->id)}}" class="btn btn-info">Ver</a>
                    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalEditar" value="{{$consulta->id}}" onclick="mostrar(this)">
                        Editar
                    </button>
                    {{--<a href="{{route('consulta.edit', $consulta->id)}}" class="btn btn-primary">Editar</a>--}}
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
        <a href="{{route('consulta.create')}} "><button class="btn btn-success">Crear consulta</button></a>
    </div>

    <script>
        function mostrar(btn){
            var ruta = "consulta/" + btn.value + "/edit";
            $.get(ruta, function(respuesta){
                $('#fecha').val(respuesta[0].fecha);
                $('#idmedico').val(respuesta[0].idmedico);
                $('#idpaciente').val(respuesta[0].idpaciente);                
                $('#id').val(respuesta[0].id);
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'consulta/' + id;

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
            var ruta = 'consultas';

            tabla.empty();

            $.get(ruta, function(respuesta){
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.fecha + "</td><td>" + element.idmedico + "</td><td>" + element.idpaciente + "</td><td><button class='btn btn-info'>Ver</button><button class='btn btn-success'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });
        }
    </script>
@endsection
