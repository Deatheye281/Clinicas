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
                    <label>Fecha:</label>
                    <input type="date" class="form-control" name="fecha" placeholder="" id="fecha">
                    </div>
                </div>                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Diagnostico asignado:</label>
                        <select name="iddiagnostico" class="form-control" id="iddiagnostico">
                            @foreach ($diagnosticos as $diagnostico)
                                <option value="{{$diagnostico->id}}"
                                @if ($fechadia -> $diagnostico == $diagnostico->id)
                                    selected
                                @endif>
                                {{$diagnostico->tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Paciente asignado:</label>
                        <select name="idpaciente" class="form-control" id="idpaciente">
                            @foreach ($pacientes as $paciente)
                                <option value="{{$paciente->id}}"
                                @if ($fechadia -> $paciente == $paciente->id)
                                    selected
                                @endif>
                                {{$paciente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="actualizar">Editar Diagnostico</button>
        </div>
      </div>
    </div>
  </div>