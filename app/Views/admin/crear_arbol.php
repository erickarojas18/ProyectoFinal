
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title><?= esc($title) ?></title>
</head>
<body class="login-back">
<div class="form-container">
    <h1 class="text-center">Registrar Árbol</h1>

    <form action="<?= base_url('arbol/guardar') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="especie">Especie:</label>
            <select name="especie" id="especie" class="form-control" required>
                <option value="">Seleccione una especie</option>
                <?php if (!empty($especies)): ?>
                    <?php foreach ($especies as $opcion): ?>
                        <option value="<?= htmlspecialchars($opcion['id']) ?>">
                            <?= htmlspecialchars($opcion['nombre_comercial'] . " (" . $opcion['nombre_cientifico'] . ")") ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" class="form-control" step="0.01" min="0" required>
        </div>
        
        <div class="form-group">
            <label for="tamano">Tamaño:</label>
            <input type="text" name="tamano" id="tamano" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen del Árbol:</label>
            <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn">Registrar Árbol</button>
        <a href="<?= base_url('/arbol') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
