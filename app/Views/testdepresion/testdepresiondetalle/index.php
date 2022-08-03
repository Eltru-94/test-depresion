<?= $this->extend('plantilla/layoutPrint')?>
<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>

<?=$this->include('testdepresion/testdepresiondetalle/table')?>
<?= $this->endSection()?>



