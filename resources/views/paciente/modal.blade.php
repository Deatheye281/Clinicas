<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar paciente</h5>
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
                        <label>Numero del registro:</label>
                        <input type="number" class="form-control" name="N_registro" placeholder="" id="N_registro">
                        </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Numero de cama:</label>
                    <select name="N_cama" class="form-control" id="N_cama">            
                        <option value="A01">A01</option>
                        <option value="A02">A02</option>
                        <option value="A03">A03</option>
                        <option value="A04">A04</option>
                        <option value="B01">B01</option>
                        <option value="B02">B02</option>
                        <option value="B03">B03</option>
                        <option value="B04">B04</option>
                        <option value="C01">C01</option>
                        <option value="C02">C02</option>
                        <option value="C03">C03</option>
                        <option value="C04">C04</option>
                        <option value="D01">D01</option>
                        <option value="D02">D02</option> 
                        <option value="D03">D03</option>
                        <option value="D04">D04</option>           
                    </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Nombre:</label>
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
                    <label>Fecha de nacimiento:</label>
                    <input type="date" class="form-control" name="F_nacimiento" placeholder="" id="F_nacimiento">
                    </div>
                </div>  
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Sexo:</label>
                    <select name="sexo" class="form-control" id="sexo">            
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>            
                    </select>
                    </div>
                </div>            
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Sala asignada:</label>
                        <select name="idsala" class="form-control" id="sala">
                            @foreach ($salas as $sala)
                                <option value="{{$sala->id}}"
                                @if ($paciente -> $sala == $sala->id)
                                    selected
                                @endif>
                                {{$sala->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </form>            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="actualizar">Editar paciente</button>
        </div>
      </div>
    </div>
  </div>
  