<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar medico</h5>
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
                  <label>Nombre del medico:</label>
                  <input type="text" class="form-control" name="nombre" id="nombre">
                  </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
              <label>Especialidad:</label>
              <input type="text" class="form-control" name="especialidad" id="especialidad">
              </div>
          </div>    
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label>Hospital:</label>
                  <select name="idhospital" class="form-control" id="idhospital">
                      @foreach ($hospitales as $hospital)
                          <option value="{{$hospital->id}}"
                          @if ($medico -> $hospital == $hospital->id)
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
          <button type="button" class="btn btn-primary" id="actualizar">Editar medico</button>
        </div>
      </div>
    </div>
  </div>
  