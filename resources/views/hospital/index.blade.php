@extends('layouts.layout')

@section('titulo')
Hospital
@endsection

@section('contenido')
@include('hospital.modal')
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
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Cantidad de camas</th>
                <th>Funciones</th>
            <tr>
        </thead>
        <tbody id="tablaDatos">
            @foreach ($hospitales as $hospital)
            <tr>
                <td>{{$hospital -> nombre}}</td>
                <td>{{$hospital -> direccion}}</td>
                <td>{{$hospital -> telefono}}</td>
                <td>{{$hospital -> camas}}</td>
                <td>
                    <form action="{{route('hospital.destroy', $hospital->id)}}" method="post">
                    <a href="{{route('hospital.show', $hospital->id)}}" class="btn btn-info float-left">Ver</a>
                    {{--<a href="{{route('hospital.edit', $hospital->id)}}" class="btn btn-primary">Editar</a>--}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalEditar" value="{{$hospital->id}}" onclick="mostrar(this)">
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
        <a href="{{route('hospital.create')}} "><button class="btn btn-success">Crear hospital</button></a>
        <a href="{{route('medico.index')}}"><button class="btn btn-success">Lista de medicos</button></a>
        <a href="{{route('laboratorio.index')}}"><button class="btn btn-success">Lista de laboratorios</button></a>
    </div>
    <script>
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
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.nombre + "</td><td>" + element.direccion + "</td><td>" + element.telefono + "</td><td>" + element.camas + "</td><td><button class='btn btn-info'>Ver</button><button class='btn btn-success'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
                });
            });           
        }
    </script>
@endsection

