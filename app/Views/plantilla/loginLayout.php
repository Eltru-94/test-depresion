<!DOCTYPE html>
<html lang="en">

<head>


     <!-- add library jquery -->
    <script src="<?= base_url('/js/jquery.min.js') ?>" crossorigin="anonymous"></script>
    <!-- add Library toastr  -->
    <script src="<?= base_url('js/toastr.min.js') ?>" crossorigin="anonymous"></script>
    <link href="<?= base_url('/css/toastr.min.css') ?>" rel="stylesheet" crossorigin="anonymous">
    <!-- addd sheet of  style -->
    <link href="<?= base_url('/css/loginStyle.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/css/styles.css') ?>">
    <link href="<?= base_url('/css/bootstrap.min.css')?>" rel="stylesheet"
</head>

<body class="bg-success">



    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluithed">

                    <?= $this->renderSection('contenido') ?>
                    <!-- section from add the container -->
                </div>
            </main>

        </div>

    </div>

    <?= $this->renderSection('scripts') ?>
        <!-- section form add scripts -->
    <?= $this->include('plantilla/links') ?>
</body>

</html>


<script>

</script>