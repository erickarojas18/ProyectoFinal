<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Árboles Disponibles</title>
</head>
<body class="login-back">
<div class="container mt-5">

    <!-- Mostrar mensaje si está presente -->
    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre Comercial</th>
                <th>Nombre Científico</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Precio</th>
                <th>Tamaño</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arboles as $arbol): ?>
                <tr>
                    <td><?= htmlspecialchars($arbol['id']) ?></td>
                    <td><?= htmlspecialchars($arbol['nombre_comercial']) ?></td>
                    <td><?= htmlspecialchars($arbol['nombre_cientifico']) ?></td>
                    <td><?= htmlspecialchars($arbol['ubicacion']) ?></td>
                    <td><?= isset($arbol['estado']) ? ($arbol['estado'] == 1 ? 'Disponible' : 'No Disponible') : 'Sin Información'; ?></td>
                    <td><?= htmlspecialchars($arbol['precio']) ?></td>
                    <td><?= htmlspecialchars($arbol['tamano']) ?></td>
                    <td>
                        <img src="<?= base_url('arboles/' . $arbol['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($arbol['nombre_comercial']) ?>" style="width: 100px; height: auto;">
                    </td>
                    <td style="white-space: nowrap;">
                        <a href="<?= base_url('comprar_arbol/' . $arbol['id']) ?>" class="btn btn-success">Comprar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
