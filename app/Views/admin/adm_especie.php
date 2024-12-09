<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <title>Administar Especie</title>
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
        <h2>Administrar Especies</h2>

        <!-- Mostrar mensaje si está presente -->
        <?php if (!empty($msg)): ?>
            <div class="alert alert-success" role="alert">
                <?= htmlspecialchars($msg); ?>
            </div>
        <?php endif; ?>

        <!-- Tabla de especies -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre Comercial</th>
                    <th>Nombre Científico</th>
                    <th>Acciones</th> <!-- Columna para los botones de acción -->
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($especies)): ?>
                    <?php foreach ($especies as $especie): ?>
                        <tr>
                            <td><?= htmlspecialchars($especie['id']); ?></td>
                            <td><?= htmlspecialchars($especie['nombre_comercial']); ?></td>
                            <td><?= htmlspecialchars($especie['nombre_cientifico']); ?></td>
                            <td>
    <!-- Botones de acción -->
    <a href="<?= base_url("admin/editar_especie/{$especie['id']}"); ?>" class="btn-action btn-edit">Editar</a>
    <a href="<?= base_url('Especies/delete/' . $especie['id']) ?>" class="btn-action btn-delete" onclick="return confirm('¿Estás seguro de eliminar a esta especie?')">Eliminar</a>
</td>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay especies registradas</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
