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
<body class="login-back">
    <div class="dashboard-main-container">
        <h2 class="dashboard-title">Estadísticas del Dashboard</h2>
        <div class="dashboard-container">
    <!-- Mostrar la cantidad de amigos registrados -->
    <div class="stat-card">
    <img src="/public/images/cantidad-de-amigos.jpg" alt="Imagen de amigos registrados" class="stat-image">
    <p class="stat-title">Amigos Registrados</p>
    <p class="stat-value"><?= is_numeric($cantidad_amigos) ? $cantidad_amigos : 'Error' ?></p>
</div>

<!-- Mostrar la cantidad de árboles disponibles -->
<div class="stat-card">
<img src="/public/images/arb-diponibles.jpg" alt="Imagen de árboles disponibles" class="stat-image">
    <p class="stat-title">Árboles Disponibles</p>
    <p class="stat-value"><?= is_numeric($cantidad_arboles_disponibles) ? $cantidad_arboles_disponibles : 'Error' ?></p>
</div>

<!-- Mostrar la cantidad de árboles vendidos -->
<div class="stat-card">
<img src="/public/images/arb-vendidos.jpg" alt="Imagen de árboles vendidos" class="stat-image">
    <p class="stat-title">Árboles Vendidos</p>
    <p class="stat-value"><?= is_numeric($cantidad_arboles_vendidos) ? $cantidad_arboles_vendidos : 'Error' ?></p>
</div>


    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>