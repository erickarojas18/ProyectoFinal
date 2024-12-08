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
    <div class="container mt-5">
        <h1><?= esc($title) ?></h1>

        <?php if (!empty($arboles)): ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Especie (Comercial)</th>
                        <th>Especie (Científico)</th>
                        <th>Ubicación</th>
                        <th>Tamaño</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arboles as $arbol): ?>
                        <tr>
                            <td><?= esc($arbol['id']) ?></td>
                            <td><?= esc($arbol['nombre_comercial']) ?></td>
                            <td><?= esc($arbol['nombre_cientifico']) ?></td>
                            <td><?= esc($arbol['ubicacion']) ?></td>
                            <td><?= esc($arbol['tamano']) ?></td>
                            <td>$<?= esc($arbol['precio']) ?></td>
                            <td>
                                <img src="<?= base_url('arboles/' . esc($arbol['imagen'])) ?>" alt="Imagen del árbol" class="img-fluid" style="max-height: 100px;">
                            </td>
                            <td>
                                <a href="<?= base_url('admin/editar_arbol/' . $arbol['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                                <form action="<?= base_url('ArbolesDisponibles/eliminar/' . $arbol['id']) ?>" method="get" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este árbol?');">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay árboles disponibles actualmente.</p>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>