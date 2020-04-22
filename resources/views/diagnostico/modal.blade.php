<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar diagnostico</h5>
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
                        <label>Tipo de Diagnostico:</label>
                        <input type="text" class="form-control" name="tipo" placeholder="" id="tipo">
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Complicacion del diagnostico:</label>
                    <input type="text" class="form-control" name="complicacion" placeholder="" id="complicacion">
                    </div>
                </div>   
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="actualizar">Editar Diagonostico</button>
        </div>
      </div>
    </div>
  </div>