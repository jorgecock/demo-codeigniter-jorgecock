<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cohetes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h1 class="text-center mb-4">🚀 Mis Cohetes</h1>
        
        <div class="d-flex justify-content-between mb-4">
            <a href="<?= base_url('rockets/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Añadir Cohete
            </a>
            <a href="<?= base_url() ?>" class="btn btn-light">🏠 Volver al Inicio</a>
        </div>


        <div class="row">
            <?php foreach ($rockets as $rocket): ?>
                <div class="col-md-4 mb-4">
                    <div class="card bg-secondary text-white">
                        <img src="<?= base_url('uploads/rockets/' . $rocket['image']) ?>" class="card-img-top img-fluid" alt="Cohete" style="height: 200px; object-fit: cover; width: 100%;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= esc($rocket['name']); ?></h5>
                            <div class="d-flex justify-content-around">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $rocket['id'] ?>">
                                    <i class="fas fa-eye"></i> Ver Detalles
                                </button>
                                <a href="<?= base_url('rockets/edit/' . $rocket['id']) ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                <a href="<?= base_url('rockets/delete/' . $rocket['id']) ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este cohete?');"><i class="fas fa-trash"></i> Eliminar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para ver detalles -->
                <div class="modal fade" id="modal<?= $rocket['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark text-white">
                            <div class="modal-header">
                                <h5 class="modal-title"><?= esc($rocket['name']); ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= base_url('uploads/rockets/' . $rocket['image']) ?>" class="img-fluid mb-3">
                                <p><?= esc($rocket['description']); ?></p>
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
