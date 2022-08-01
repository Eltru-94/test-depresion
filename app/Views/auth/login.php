<?= $this->extend('plantilla/loginLayout') ?>

<?= $this->section('contenido') ?>
<br>
<br>
<br>
<br>

<div class="row">
    <div class="col-sm-3 mb-3 mb-sm-0">

    </div>
    <div class="col-sm-8 mb-8 mb-sm-0">
        <div class="card">
            <div class="card-header">
                <h4 class="m-0 font-weight-bold text-dark text-center"><?php echo $title; ?></h4>
            </div>
            <div class="card-body">
                <form name="formLogin" id="formLogin">
                    <div class="form-group row">
                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <label class="small mb-1">Correo</label>
                            <input type="text" class="form-control" name="correo" id="correo" placeholder="Ingrese el correo">
                            <span class="text-danger error-text correo_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-12 mb-sm-0">
                            <label class="small mb-1">Contraseña</label>
                            <input type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="Ingrese la contraseña">
                            <span class="text-danger error-text contrasenia_error"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <input type="submit" id="btnLogin" name="btnLogin" class="btn btn-dark" value="Iniciar sessión">

                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-2 mb-0 mb-sm-0">

    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->include('/auth/auth') ?>

<?= $this->endSection() ?>