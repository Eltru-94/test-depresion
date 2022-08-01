<!--Inicio Tabla lista Usuario -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <div><button type="button" title="Resgistrar Paciente" class="btn btn-outline-primary my-2 my-sm-0" onclick="titleCreate()"   data-bs-toggle="modal"
                                 data-bs-target="#modalPaciente">
                            <i class="fas fa-plus-square"></i>
                        </button>
                    </div>
                    <br>

                </div>
            </div>
            <table class="table table-sm table-hover text-center" id="tablaPacientes" style="width:100%" name="tablaPacientes">
                <thead>
                <th>ID</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>CEDULA</th>
                <th>EDAD</th>
                <th>SEXO</th>
                <th>PROVICIA</th>
                <th>CIUDAD</th>
                <th>ACCIÓN</th>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
</div