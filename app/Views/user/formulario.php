<div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="clearFormulario()" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form name="forUser" id="forUser" enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Nombre : </label>
                            <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="id_user : ">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre : ">
                            <span class="text-danger error-text nombre_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Apellido : </label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido : ">
                            <span class="text-danger error-text apellido_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Cédula : </label>
                            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese la cédula : ">
                            <span class="text-danger error-text cedula_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Correo : </label>
                            <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo : ">
                            <span class="text-danger error-text correo_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Telefono : </label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono : ">
                            <span class="text-danger error-text telefono_error"></span>
                        </div>
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <label class="small mb-1">Selecione el rol</label>
                            <select name="id_rol" id="id_rol" class="form-control">

                            </select>
                            <span class="text-danger error-text roles_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Clave : </label>
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave : ">
                            <span class="text-danger error-text clave_error"></span>
                        </div>
                        <div class="col-sm-6 mb-6 mb-sm-0">
                            <label class="small mb-1">Confirmar clave : </label>
                            <input type="password" class="form-control" id="cclave" name="cclave" placeholder="Confirmar Calve : ">
                            <span class="text-danger error-text clave_error"></span>
                        </div>

                    </div>




                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" onclick="clearFormulario()" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" id="btnUser" name="btnUser" class="btn btn-outline-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>