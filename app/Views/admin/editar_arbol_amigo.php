<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editar Árbol</title>
</head>
<body class="login-back">
<div class="container mt-5">
    <div class="form-wrapper">
        <h2>Editar Árbol</h2>
        <form method="POST" enctype="multipart/form-data" action="<?= current_url() ?>">
            <div class="form-group">
                <label for="especie">Especie:</label>
                <input type="text" name="especie" id="especie" class="form-control" 
                       value="<?= htmlspecialchars($arbol['especie']) ?>" required>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" name="ubicacion" id="ubicacion" class="form-control" 
                       value="<?= htmlspecialchars($arbol['ubicacion']) ?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="Disponible" <?= $arbol['estado'] === 'Disponible' ? 'selected' : '' ?>>Disponible</option>
                    <option value="Vendido" <?= $arbol['estado'] === 'Vendido' ? 'selected' : '' ?>>Vendido</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tamano">Tamaño:</label>
                <input type="text" name="tamano" id="tamano" class="form-control" 
                       value="<?= htmlspecialchars($arbol['tamano']) ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" class="form-control" step="0.01" 
                       value="<?= htmlspecialchars($arbol['precio']) ?>" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                <?php if (!empty($arbol['imagen'])): ?>
                    <small>Imagen actual: <?= htmlspecialchars($arbol['imagen']) ?></small>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>
</body>
</html>
