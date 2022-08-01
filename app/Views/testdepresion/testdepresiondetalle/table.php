<!--Inicio Tabla lista Usuario -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

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