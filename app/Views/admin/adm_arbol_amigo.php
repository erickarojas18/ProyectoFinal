<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Administrar Árboles Amigo </title>
</head>

<body class="login-back">
    <div class="container mt-5">
        <h2>Administrar Árboles Amigo</h2>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php elseif (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Amigo</th>
                    <th>Nombre Comercial</th>
                    <th>Nombre Científico</th>
                    <th>Ubicación</th>
                    <th>Fecha de Compra</th>
                    <th>Precio</th>
                    <th>Tamaño</th>
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
                        <td><?= htmlspecialchars($arbol['fecha_compra']) ?></td>
                        <td><?= htmlspecialchars($arbol['precio']) ?></td>
                        <td><?= htmlspecialchars($arbol['tamano']) ?></td>
                        <td>
                            <a href="<?= base_url('admin/editar_arbol_amigo/' . $arbol['id']) ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="<?= base_url('Vista/eliminarArbol/' . $arbol['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar este árbol?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>