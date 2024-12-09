<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('Login/autenticar') ?>" method="POST">
        <?= csrf_field() ?>  <!-- Incluir token CSRF -->
        <div>
            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
        </div>
        <div>
            <button type="submit">Iniciar sesión</button>
        </div>
    </form>
</body>
</html>
