<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar informacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="#" method="post"  id="formulario">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" placeholder="" id="descripcion">
                    </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Fecha:</label>
                <input type="date" class="form-control" name="fecha" placeholder="" id="fecha">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Hosptital asignado:</label>
                    <select name="idhospital" class="form-control" id="idhospital">
                        @foreach ($hospitales as $hospital)
                            <option value="{{$hospital->id}}"
                            @if ($detalle -> $hospital == $hospital->id)
                                selected
                            @endif>
                            {{$hospital->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>                
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Laboratorio asignado:</label>
                    <select name="idlaboratorio" class="form-control" id="idlaboratorio">
                        @foreach ($laboratorios as $laboratorio)
                            <option value="{{$laboratorio->id}}"
                            @if ($detalle -> $laboratorio == $laboratorio->id)
                                selected
                            @endif>
                            {{$laboratorio->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>    
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="actualizar">Editar Informacion</button>
        </div>
      </div>
    </div>
  </div>