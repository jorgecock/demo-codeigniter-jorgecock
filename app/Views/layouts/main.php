<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rocket App 🚀</title>
    
    <!-- Bootstrap y Estilos Personalizados -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>"> 

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</head>
<body class="bg-dark text-white"> <!-- FONDO NEGRO Y TEXTO BLANCO -->
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="<?= base_url('/') ?>">
                <img src="<?= base_url('assets/img/rocket-icon.png') ?>" alt="Rocket">
                Rocket App
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/rockets') ?>">🚀 Cohetes de Jorge Cock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/rockets/spacex') ?>">🚀 Cohetes de SpaceX</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.codeigniter.com/">🔥 CodeIgniter</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="https://jorgecock.github.io/software.html">📜 Portafolio Jorge Cock</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container my-4">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Footer -->
    <?= $this->include('layouts/footer') ?>
</body>
</html>

