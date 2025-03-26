<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cohete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h1 class="text-center">🚀 Agregar Nuevo Cohete</h1>

        <div class="card bg-secondary text-white p-4">
            <form action="<?= base_url('rockets/store') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Cohete:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Imagen del Cohete:</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required onchange="previewImage(event)">
                    <div class="text-center mt-3">
                        <img id="preview" src="#" alt="Vista previa" class="img-fluid rounded" style="max-width: 200px; display: none;">
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                    <a href="<?= base_url('rockets') ?>" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Rocket App 🚀 - Desarrollado por Jorge</p>
            <p>Hecho con CodeIgniter</p>
        </div>
    </footer>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = "none";
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
