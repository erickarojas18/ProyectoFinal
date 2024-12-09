<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <title>Formulario con Menú de Navegación</title>
</head>
<body class="login-back">

  <!-- Menú de Navegación -->
  <ul class="nav nav-tabs" id="navId">
    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Especies</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= base_url('especies') ?>">Administrar Especie</a>
        <a class="dropdown-item" href="<?= base_url('admin/crear_especie') ?>">Nueva Especie</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Amigos</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= base_url('admin/ver_arboles') ?>">Ver Árboles por Amigos</a>
        <a class="dropdown-item" href="<?= base_url('admin/adm_arbol_amigo') ?>">Administrar Árboles de Amigos</a>
        <a class="dropdown-item" href="<?= base_url('amigos') ?>">Administrar Amigos</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Árboles</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= base_url('arbol/crear') ?>">Nuevo Árbol</a>
        <a class="dropdown-item" href="<?= base_url('arbol') ?>">Administrar Árboles</a>
      </div>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('dashboard') ?>" class="nav-link">Dashboard</a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('registrar') ?>" class="nav-link">Signup</a>
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
        <h2>Administrar Amigos</h2>

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
                                <a href="<?= base_url('admin/editar/' . $amigo['id']) ?>" class="btn-action btn-edit">Editar</a>
                                <a href="<?= base_url('Amigos/eliminar/' . $amigo['id']) ?>" class="btn-action btn-delete" onclick="return confirm('¿Estás seguro de eliminar a este amigo?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron registros en la tabla amigos.</p>
        <?php endif; ?>
    </div>
    </div>
     <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
