@extends('layouts.layout')

@section('titulo')
Medico
@endsection

@section('contenido')
@include('medico.modal')
<h1 class="text-center">Medico</h1>
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
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Funciones</th>                
            <tr>
        </thead>
        <tbody>
            @foreach ($medicos as $medico)                 
            <tr>
                <td>{{$medico -> idhospital}}</td>                            
                <td>{{$medico -> nombre}}</td>
                <td>{{$medico -> especialidad}}</td>                
                <td>
                    <form action="{{route('medico.destroy', $medico->id)}}" method="post">
                    <a href="{{route('medico.show', $medico->id)}}" class="btn btn-info">Ver</a>
                    {{--<a href="{{route('medico.edit', $medico->id)}}" class="btn btn-primary">Editar</a>--}}
                    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalEditar" value="{{$medico->id}}" onclick="mostrar(this)">
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
        <a href="{{route('medico.create')}} "><button class="btn btn-success">Crear medico</button></a>
    </div>

    <script>
        function mostrar(btn){
            var ruta = "medico/" + btn.value + "/edit";
            $.get(ruta, function(respuesta){
                $('#nombre').val(respuesta[0].nombre);
                $('#especialidad').val(respuesta[0].especialidad);
                $('#idhospital').val(respuesta[0].idhospital);                
                $('#id').val(respuesta[0].id);
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'medico/' + id;

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
            var ruta = 'medicos';

            tabla.empty();

            $.get(ruta, function(respuesta){
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.nombre + "</td><td>" + element.especialidad + "</td><td>" + element.idhospital + "</td><td><button class='btn btn-info'>Ver</button><button class='btn btn-success'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });
        }
    </script>
@endsection
