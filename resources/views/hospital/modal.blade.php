<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar hospital</h5>
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
                        <label>Nombre del hospital:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre">
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Direccion:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="" id="direccion">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Telefono:</label>
                    <input type="number" class="form-control" name="telefono" placeholder="0" id="telefono">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Cantidad de camas:</label>
                    <input type="number" class="form-control" name="camas" placeholder="0" id="camas">
                    </div>
                </div>                
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="actualizar">Editar hospital</button>
        </div>
      </div>
    </div>
  </div>
  