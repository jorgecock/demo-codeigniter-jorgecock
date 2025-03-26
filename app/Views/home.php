<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container text-center">
    <img src="<?= base_url('assets/img/codeigniter-logo.png') ?>" alt="CodeIgniter" class="img-fluid mt-4" style="max-width: 300px;">
    <h1 class="mt-3">Bienvenido a RocketApp 🚀</h1>
    <p class="lead">
        Esta es una aplicación de prueba desarrollada en <strong>CodeIgniter 4</strong>, utilizando <strong>MySQL / MariaDB</strong> para la base de datos.
        Forma parte del portafolio de Jorge A. Cock como desarrollador web, en BackEnd/FullStack. En caso de estar intersado como ha sido desarrollada contactar a Jorge Cock. 
    </p>
</div>
<?= $this->endSection() ?>
