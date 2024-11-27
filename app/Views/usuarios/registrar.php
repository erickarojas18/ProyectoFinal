<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <main class="signup-container">
        <div class="form-wrapper">
            <h1 class="text-center">Sign Up</h1>
            <form action="<?= base_url('usuarios/registrar') ?>" method="POST" novalidate>
                <!-- Token CSRF -->
                <?= csrf_field() ?>
                <div class="form-row">
                    <!-- Columna izquierda -->
                    <div class="form-column">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Enter your last name" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Enter phone number" required pattern="[0-9]{10,15}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Enter address" required>
                        </div>
                    </div>
                    <!-- Columna derecha -->
                    <div class="form-column">
                        <div class="form-group">
                            <label for="pais">País</label>
                            <select class="form-control" id="pais" name="pais" required>
                                <option value="">Selecciona un país</option>
                                <!-- Opciones dinámicas generadas desde el servidor -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required minlength="8">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?= $this->endSection() ?>
</body>
</html>
