@extends('layouts.layout')

@section('titulo')
Hospital
@endsection

@section('contenido')
{{--@include('hospital.modal')--}}
<h1 class="text-center">Hospital</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Direccion</th>
                <th class="text-center">Telefono</th>
                <th class="text-center">Cantidad de camas</th>
                <th class="text-center">Funciones</th>
            <tr>
        </thead>
        <tbody id="tablaDatos">
            @foreach ($hospitales as $hospital)
            <tr class="text-center">
                <td class="text-center">{{$hospital -> nombre}}</td>
                <td class="text-center">{{$hospital -> direccion}}</td>
                <td class="text-center">{{$hospital -> telefono}}</td>
                <td class="text-center">{{$hospital -> camas}}</td>
                <td>
                    <form action="{{route('hospital.destroy', $hospital->id)}}" method="post">
                    <a href="{{route('hospital.show', $hospital->id)}}" class="btn btn-info">Ver</a> 
                    @can('editar-hospital')
                    <a href="{{route('hospital.edit', $hospital->id)}}" class="btn btn-primary">Editar</a>                    
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" value="{{$hospital->id}}" onclick="mostrar(this)">Editar</button>--}}
                    @endcan
                    @can('eliminar-hospital')
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

    <li><h5>Crear un nuevo hospital</h5>
    <a href="{{route('hospital.create')}}"><button class="btn btn-success">Crear Hospital</button></a> </li>

   <li><h5>Crear un nuevo medico</h5>
    <a href="{{route('medico.index')}}"><button class="btn btn-success">Crear Medico</button></a> </li>

   <li> <h5>Crear una nueva sala</h5>
    <a href="{{route('sala.index')}}"><button class="btn btn-success">Crear Salas</button></a></li>

    <li><h5>Crear un nuevo laboratorio</h5>
        <a href="{{route('laboratorio.index')}}"><button class="btn btn-success">Crear Laboratorios</button></a></li>
    <li><h5>Home</h5>
    <a href="{{route('inicio')}}"><button class="btn btn-primary">Volver</button></a></li>
    </ul>
    
</div>
    {{--<script>
        function mostrar(btn){
            var ruta = "hospital/" + btn.value + "/edit";            
            $.get(ruta, function(respuesta){                
                $('#nombre').val(respuesta[0].nombre);
                $('#direccion').val(respuesta[0].direccion);
                $('#telefono').val(respuesta[0].telefono);
                $('#camas').val(respuesta[0].camas);
                $('#id').val(respuesta[0].id);
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'hospital/' + id;
                 
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
            var ruta = 'hospitales';

            tabla.empty();

            $.get(ruta, function(respuesta){
                console.log(respuesta);
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.nombre + "</td><td>" + element.direccion + "</td><td>" + element.telefono + "</td><td>" + element.camas + "</td><td><button class='btn btn-info'>Ver</button><button class='btn btn-success'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });           
        }
    </script>--}}
@endsection

