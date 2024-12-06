<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Especie</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-back">
    
<div class="container mt-5">
    <div class="form-wrapper">
        <h1>Editar Especie</h1>

        <!-- Mostrar mensaje si está presente -->
        <?php if (!empty($msg)): ?>
            <div class="alert alert-success" role="alert">
                <?= htmlspecialchars($msg); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario de Edición -->
        <form action="<?= base_url("Especies/update/{$especie['id']}"); ?>" method="post">
            <div class="form-group">
                <label for="nombre_comercial">Nombre Comercial</label>
                <input type="text" class="form-control" id="nombre_comercial" name="nombre_comercial" value="<?= htmlspecialchars($especie['nombre_comercial']); ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre_cientifico">Nombre Científico</label>
                <input type="text" class="form-control" id="nombre_cientifico" name="nombre_cientifico" value="<?= htmlspecialchars($especie['nombre_cientifico']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Especie</button>
        </form>

    </div>
</div>
</body>
</html>
