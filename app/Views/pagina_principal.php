<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <title>Administar Usuarios</title>
</head>
<body class="login-background">

  <!-- Menú de Navegación -->
  <ul class="nav nav-tabs" id="navId">

    
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
<body class="login-background">
    <!-- Login Form -->
    <div class="form-container">
        <h2>Login</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('Login/autenticar') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
