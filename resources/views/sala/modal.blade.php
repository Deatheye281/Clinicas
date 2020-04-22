<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar sala</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="#" method="post" id="formulario">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Nombre de la sala:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre">
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Cantidad de camas:</label>
                    <input type="number" class="form-control" name="c_camas" placeholder="0" id="c_camas">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Hospital:</label>
                        <select name="idhospital" class="form-control" id="idhospital">
                            @foreach ($hospitales as $hospital)
                                <option value="{{$hospital->id}}"
                                @if ($sala -> $hospital == $hospital->id)
                                    selected
                                @endif>
                                {{$hospital->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>          
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="actualizar">Editar sala</button>
        </div>
      </div>
    </div>
  </div>
  