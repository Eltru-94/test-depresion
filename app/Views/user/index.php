<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>

<?=$this->include('user/formulario')?>
<?=$this->include('user/table')?>

<?= $this->endSection()?>


<?= $this->section('scripts')?>
<?=$this->include('user/users') ?>
<?= $this->endSection()?>