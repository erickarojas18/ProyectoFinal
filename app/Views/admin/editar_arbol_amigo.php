<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <title>Editar Arbol</title>
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
        <h2>Editar Árbol</h2>
        <form method="POST" enctype="multipart/form-data" action="<?= current_url() ?>">
            <div class="form-group">
                <label for="especie">Especie:</label>
                <input type="text" name="especie" id="especie" class="form-control" 
                       value="<?= htmlspecialchars($arbol['especie']) ?>" required>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" name="ubicacion" id="ubicacion" class="form-control" 
                       value="<?= htmlspecialchars($arbol['ubicacion']) ?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="Disponible" <?= $arbol['estado'] === 'Disponible' ? 'selected' : '' ?>>Disponible</option>
                    <option value="Vendido" <?= $arbol['estado'] === 'Vendido' ? 'selected' : '' ?>>Vendido</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tamano">Tamaño:</label>
                <input type="text" name="tamano" id="tamano" class="form-control" 
                       value="<?= htmlspecialchars($arbol['tamano']) ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" class="form-control" step="0.01" 
                       value="<?= htmlspecialchars($arbol['precio']) ?>" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                <?php if (!empty($arbol['imagen'])): ?>
                    <small>Imagen actual: <?= htmlspecialchars($arbol['imagen']) ?></small>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>
 <!-- jQuery and Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
