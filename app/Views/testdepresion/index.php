<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>

<?=$this->include('testdepresion/table')?>
<?= $this->endSection()?>


<?= $this->section('scripts')?>
<?=$this->include('testdepresion/testdepresion')?>
<?= $this->endSection()?>
