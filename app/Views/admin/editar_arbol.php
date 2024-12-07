<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title><?= esc($title) ?></title>
</head>
 <body class="login-back">>
    <div class="container mt-5">
        <h1><?= esc($title) ?></h1>
        
        <form action="<?= base_url('ArbolesDisponibles/actualizar/' . esc($arbol['id'])) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="especie">Especie</label>
                <input type="text" class="form-control" id="especie" name="especie" value="<?= esc($arbol['especie']) ?>" required>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?= esc($arbol['ubicacion']) ?>" required>
            </div>
            <div class="form-group">
                <label for="tamano">Tamaño</label>
                <input type="text" class="form-control" id="tamano" name="tamano" value="<?= esc($arbol['tamano']) ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?= esc($arbol['precio']) ?>" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen">
                <?php if (!empty($arbol['imagen'])): ?>
                    <small>Imagen actual:</small>
                    <img src="<?= base_url('arboles/' . esc($arbol['imagen'])) ?>" alt="Imagen del árbol" class="img-fluid" style="max-height: 100px;">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="<?= base_url('arboles') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
