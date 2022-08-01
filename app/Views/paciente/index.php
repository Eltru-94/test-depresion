<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>
<?=$this->include('paciente/formulario') ?>
<?=$this->include('paciente/tabla') ?>

<?= $this->endSection()?>


<?= $this->section('scripts')?>
<?=$this->include('paciente/paciente') ?>
<?= $this->endSection()?>
