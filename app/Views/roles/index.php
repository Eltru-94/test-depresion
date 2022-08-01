<?= $this->extend('plantilla/layout')?>
<?= $this->section('titulo')?>
<?php echo $title;?>
<?= $this->endSection()?>

<?= $this->section('contenido')?>
<br>

<?=$this->include('roles/tabla')?>

<?= $this->endSection()?>


<?= $this->section('scripts')?>
<?=$this->include('roles/rol')?>
<?= $this->endSection()?>