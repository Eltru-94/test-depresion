
<div class="modal fade" id="modalPaciente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="clearFormulario()" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form name="forPaciente" id="forPaciente" enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Nombre : </label>
                            <input type="hidden" class="form-control" id="id_paciente" name="id_paciente">
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres : ">
                            <span class="text-danger error-text nombres_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Apellido : </label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos : ">
                            <span class="text-danger error-text apellidos_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Cédula : </label>
                            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese la cédula : ">
                            <span class="text-danger error-text cedula_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Fecha nacimiento : </label>
                            <input type="date" value="2000-01-01"  class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                            <span class="text-danger error-text fecha_nacimiento_error"></span>
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Sexo : </label>
                            <select id="sexo" name="sexo" class="form-control" aria-label="Default select example">
                                <option value="" selected>Seleccione el sexo</option>
                                <option value="hombre">Hombre</option>
                                <option value="mujer">Mujer</option>
                                <option value="otros">Otros</option>
                            </select>
                            <span class="text-danger error-text sexo_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Provincia</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia : ">
                            <span class="text-danger error-text provincia_error"></span>
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad : ">
                            <span class="text-danger error-text ciudad_error"></span>
                        </div>

                    </div>




                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" onclick="clearFormulario()" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" id="btnPaciente" name="btnPaciente" class="btn btn-outline-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>