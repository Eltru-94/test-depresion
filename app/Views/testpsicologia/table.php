<!--Inicio Tabla lista Usuario -->
<div class="card shadow mb-4">
    <div class="card-header py-3 centro">
        <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title;?></h4>
    </div>

    <div class="card-body">
        <form name="forTest" id="forTest">

            <input type="hidden" class="form-control" id="id_paciente" name="id_paciente" value=" <?php echo $id_paciente;?>">
        <?php foreach ($test as $row){?>
            <div class="form-group">
            <?php $opciones_array=array($row['opcion_1'],$row['opcion_2']); shuffle($opciones_array);?>
            <p><strong><?=$row['id_test']?> . - <?=$row['test']?></strong></p>
            <div class="form-check">
            <input type="radio" class="form-check-input" name="pregunta_<?=$row['id_test']?>" value="<?=$opciones_array[0]?>">
                <label class="form-check-label" for="flexRadioDefault1"><?=$opciones_array[0]?></label>
            </div>
            <div class="form-check">
            <input type="radio" class="form-check-input" name="pregunta_<?=$row['id_test']?>" value="<?=$opciones_array[1]?>">
                <label class="form-check-label" for="flexRadioDefault1"><?=$opciones_array[1]?></label>
            </div>
                <span class="text-danger error-text pregunta_<?=$row['id_test']?>_error"></span>
            </div>

        <?php }?>
            <hr>
            <div class="text-center">
                <input type="button" onclick="test()"  class="btn btn-outline-primary" value="Guardar Test">
            </div>
        </form>

    </div>
</div