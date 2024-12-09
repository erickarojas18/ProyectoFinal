<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Árboles Comprados</title>
</head>
<body class="login-back">
<div class="container mt-5">
    <h2>Tus Árboles Comprados</h2>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre Comercial</th>
                <th>Nombre Científico</th>
                <th>Ubicación</th>
                <th>Fecha de Compra</th>
                <th>Precio</th>
                <th>Tamaño</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arboles as $arbol): ?>
                <tr>
                    <td><?= htmlspecialchars($arbol['id']) ?></td>
                    <td><?= htmlspecialchars($arbol['nombre_comercial']) ?></td>
                    <td><?= htmlspecialchars($arbol['nombre_cientifico']) ?></td>
                    <td><?= htmlspecialchars($arbol['ubicacion']) ?></td>
                    <td><?= date('d/m/Y H:i:s', strtotime($arbol['fecha_compra'])) ?></td>
                    <td><?= htmlspecialchars($arbol['precio']) ?></td>
                    <td><?= htmlspecialchars($arbol['tamano']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
