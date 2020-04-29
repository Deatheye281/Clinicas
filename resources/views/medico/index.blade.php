@extends('layouts.layout')

@section('titulo')
Medico
@endsection

@section('contenido')
{{--@include('medico.modal')--}}
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
                <th class="text-center">ID Hospital</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Especialidad</th>
                <th class="text-center">Funciones</th>                
            <tr>
        </thead>
        <tbody id="tablaDatos">
            @foreach ($medicos as $medico)                 
            <tr class="text-center">
                <td class="text-center">{{$medico -> idhospital}}</td>                            
                <td class="text-center">{{$medico -> nombre}}</td>
                <td class="text-center">{{$medico -> especialidad}}</td>                
                <td class="text-center">
                    <form action="{{route('medico.destroy', $medico->id)}}" method="post">
                    <a href="{{route('medico.show', $medico->id)}}" class="btn btn-info">Ver</a>
                    @can('editar-medico')
                    <a href="{{route('medico.edit', $medico->id)}}" class="btn btn-primary">Editar</a>                   
                   {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" value="{{$medico->id}}" onclick="mostrar(this)">
                        Editar
                    </button>--}}
                    @endcan
                    @can('eliminar-medico')
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
        <li><h5>Crear un nuevo medico</h5>
        <a href="{{route('medico.create')}}"><button class="btn btn-success">Crear Medico</button></a> </li>

       <li><h5>Crear un nuevo paciente</h5>
        <a href="{{route('paciente.index')}}"><button class="btn btn-success">Crear Paciente</button></a> </li>
    
       <li> <h5>Crear una nueva consulta</h5>
        <a href="{{route('consulta.index')}}"><button class="btn btn-success">Crear Consultas</button></a></li>
            
        <li><h5>Home</h5>
        <a href="{{route('inicio')}}"><button class="btn btn-primary">Volver</button></a></li>
        </ul>
        
    </div> 

    {{--<script>
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
    </script>--}}
@endsection
