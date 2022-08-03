<!--Inicio Tabla lista Usuario -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
<hr>
        <div class="row">
            <div class="col-md-6">
                <label><strong> Profesional :  </strong> <?php echo $testRealizado[0]['PROFESIONAL'];?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><strong> Paciente : </strong>  <?php echo $paciente['nombres'].' '.$paciente['apellidos'];?></label>
            </div>
            <div class="col-md-6">
                <label><strong> Cedula :  </strong> <?php echo $paciente['cedula'];?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><strong> Provincia :  </strong> <?php echo $paciente['provincia'];?></label>
            </div>
            <div class="col-md-6">
                <label><strong>Ciudad :  </strong> <?php echo $paciente['ciudad'];?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><strong>Fecha nacimiento :  </strong> <?php echo $paciente['fecha_nacimiento'];?></label>
            </div>
            <div class="col-md-6">
                <label><strong> Sexo : </strong>  <?php echo $paciente['sexo'];?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><strong>Fecha creación :  </strong> <?php echo $paciente['created_at'];?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><strong>TIPO DE DEPRESIÓN :  </strong> <?php echo $testRealizado[0]['detalle'];?></label>
            </div>
        </div>
    </div>
<hr>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-sm table-hover text-center" id="tablatestRespuesta" style="width:100%" name="tablatestRespuesta">
                <thead>
                <th>ID</th>
                <th>PREGUNTA </th>
                <th>RESPUESTA</th>
                </thead>
                <tbody>
                <?php $cont=1; foreach ($testRealizado as $row){?>
                    <tr>
                        <td><?=$cont?></td>
                        <td><?=$row['test']?></td>
                        <td><?=$row['contestacion']?></td>
                    </tr>
                <?php $cont++; }?>
                </tbody>
            </table>

        </div>
    </div>
</div