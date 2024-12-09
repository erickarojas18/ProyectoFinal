
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Árboles Comprados por Amigos</title>
</head>
<body class="login-back">
    <!-- Menú de navegación -->
    <ul class="nav nav-tabs" id="navId">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Especies</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('especies') ?>">Administrar Especie</a>
                <a class="dropdown-item" href="<?= base_url('especies/registrar') ?>">Nueva Especie</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Amigos</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('admin/lista') ?>">Ver Árboles por Amigos</a>
                <a class="dropdown-item" href="<?= base_url('compras') ?>">Administrar Árboles de Amigos</a>
                <a class="dropdown-item" href="<?= base_url('amigos') ?>">Administrar Amigos</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Árboles</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('arboles/registrar') ?>">Nuevo Árbol</a>
                <a class="dropdown-item" href="<?= base_url('arboles/administrar') ?>">Administrar Árboles</a>
            </div>
        </li>
        
        <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">Dashboard</a>
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

<div class="container mt-5">
    <h2>Árboles Comprados por Amigos</h2>

    <!-- Mostrar mensaje de éxito si está presente -->
    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID Árbol</th>
                <th>Amigo</th>
                <th>Especie</th>
                <th>Ubicación</th>
                <th>Precio</th>
                <th>Fecha de Compra</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trees as $tree): ?>
                <tr>
                    <td><?= $tree['arbol_id'] ?></td>
                    <td><?= $tree['nombre'] . ' ' . $tree['apellidos'] ?></td>
                    <td><?= $tree['nombre_comercial'] ?> (<?= $tree['nombre_cientifico'] ?>)</td>
                    <td><?= $tree['ubicacion'] ?></td>
                    <td><?= $tree['precio'] ?></td>
                    <td><?= $tree['fecha_compra'] ?></td>
                    <td>
                        <a href="<?= base_url('admin/editar_arbola/' . $tree['arbol_id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?= base_url('Compras/delete/' . $tree['arbol_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este árbol?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>


