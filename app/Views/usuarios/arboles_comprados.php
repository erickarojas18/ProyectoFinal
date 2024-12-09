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
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="navId">
        <li class="nav-item">
            <a href="<?= base_url('usuarios/arboles_comprados') ?>" class="nav-link">Mis Árboles</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('arboles_disponibles') ?>" class="nav-link">Árboles Disponibles</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('signup') ?>" class="nav-link">Signup</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('login') ?>" class="nav-link">Login</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('logout') ?>" class="nav-link">Logout</a>
        </li>
    </ul>

    <div class="form-wrapper">
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
        <!-- jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>