<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">✏️ Editar Cohete</h2>

            <div class="card bg-secondary text-white p-4 shadow-lg">
                <form action="<?= base_url('rockets/update/' . $rocket['id']) ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" name="name" id="name" class="form-control" value="<?= esc($rocket['name']) ?>" required>
                            <label for="name">🚀 Nombre</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea name="description" id="description" class="form-control" style="height: 150px;" required><?= esc($rocket['description']) ?></textarea>
                            <label for="description">📝 Descripción</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label fw-bold">🖼️ Imagen (opcional):</label>
                        <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
                    </div>

                    <?php if (!empty($rocket['image'])): ?>
                    <div class="text-center mb-3">
                        <div class="card p-2 bg-dark">
                            <img id="preview" src="<?= base_url('uploads/rockets/' . $rocket['image']) ?>" alt="Cohete" class="img-thumbnail rounded shadow" style="max-width: 250px;">
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- <div class="form-check form-switch mb-3">
                        <input type="checkbox" name="active" id="active" class="form-check-input" value="1" <?= $rocket['active'] ? 'checked' : '' ?>>
                        <label for="active" class="form-check-label">✅ Activo</label>
                    </div>  -->

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Actualizar</button>
                        <a href="<?= base_url('rockets') ?>" class="btn btn-light btn-lg text-dark border">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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

<?= $this->endSection() ?>
