<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title><?= esc($title) ?></title>
</head>
  <!-- Menú de navegación -->
    <body class="login-back">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="navId">
    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Especies</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= base_url('especies/administrar') ?>">Administrar Especie</a>
        <a class="dropdown-item" href="<?= base_url('especies/registrar') ?>">Nueva Especie</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Amigos</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= base_url('admin/lista') ?>">Ver Árboles por Amigos</a>
        <a class="dropdown-item" href="<?= base_url('amigos/administrar') ?>">Administrar Árboles de Amigos</a>
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
        <h1><?= esc($title) ?></h1>

        <?php if (!empty($amigos)): ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>País</th>
                        <th>Último Inicio de Sesión</th>
                        <th>Acciones</th> <!-- Nueva columna para botones -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($amigos as $amigo): ?>
                        <tr>
                            <td><?= esc($amigo['id']) ?></td>
                            <td><?= esc($amigo['nombre']) ?></td>
                            <td><?= esc($amigo['apellidos']) ?></td>
                            <td><?= esc($amigo['telefono']) ?></td>
                            <td><?= esc($amigo['email']) ?></td>
                            <td><?= esc($amigo['direccion']) ?></td>
                            <td><?= esc($amigo['pais']) ?></td>
                            <td><?= esc($amigo['ultimo_inicio_sesion']) ?></td>
                            <td>
                                <a href="<?= base_url('admin/editar/' . $amigo['id']) ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="<?= base_url('Amigos/eliminar/' . $amigo['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar a este amigo?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron registros en la tabla amigos.</p>
        <?php endif; ?>
    </div>
</body>
</html>
