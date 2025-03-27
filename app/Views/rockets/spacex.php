<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cohetes de SpaceX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Cohetes de SpaceX 🚀</h1>
         <div class="d-flex justify-content-between mb-4">
            <a href="<?= base_url() ?>" class="btn btn-light">🏠 Volver al Inicio</a>
        </div>  

        <div class="row">
            <?php foreach ($rockets as $index => $rocket): ?>
                <div class="col-md-4 mb-4">
                    <div class="card bg-secondary text-white">
                        <img src="<?= esc($rocket['image']) ?>" class="card-img-top" alt="<?= esc($rocket['name']) ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= esc($rocket['name']) ?></h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rocketModal<?= $index ?>">
                                Ver Detalles
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal de detalles -->
                <div class="modal fade" id="rocketModal<?= $index ?>" tabindex="-1" aria-labelledby="rocketModalLabel<?= $index ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-dark">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rocketModalLabel<?= $index ?>"><?= esc($rocket['name']) ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= esc($rocket['image']) ?>" class="img-fluid mb-3" alt="<?= esc($rocket['name']) ?>">
                                <p><?= esc($rocket['description']) ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>


     <!-- Footer -->
    <footer class="footer bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Rocket App 🚀 - Desarrollado por Jorge A. Cock</p>
            <p>Hecho con CodeIgniter</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
