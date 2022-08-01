<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>


<?=$this->include('testpsicologia/table')?>

<?= $this->endSection()?>


<?= $this->section('scripts')?>
<?=$this->include('testpsicologia/testpsicologia') ?>
<?= $this->endSection()?>
