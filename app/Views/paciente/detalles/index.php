<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>
<?=$this->include('paciente/detalles/formulario') ?>
<?=$this->include('paciente/detalles/tabla') ?>

<?= $this->endSection()?>


<?= $this->section('scripts')?>
<?=$this->include('paciente/detalles/paciente') ?>
<?= $this->endSection()?>
