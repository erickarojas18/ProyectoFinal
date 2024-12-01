<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title><?= esc($title) ?></title>
</head>
<body class="login-back ">
<div class="container mt-5">
<div class="form-wrapper">
    <h1><?= esc($title) ?></h1>
    <form action="<?= base_url('Amigos/actualizar/' . $amigo['id']) ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= esc($amigo['nombre']) ?>" required>
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?= esc($amigo['apellidos']) ?>" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="form-control" value="<?= esc($amigo['telefono']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= esc($amigo['email']) ?>" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control" value="<?= esc($amigo['direccion']) ?>" required>
        </div>

        <div class="form-group">
            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" class="form-control" value="<?= esc($amigo['pais']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
</div>
</body>
</html>
