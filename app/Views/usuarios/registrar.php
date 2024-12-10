<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Administar Usuarios</title>
</head>

<body class="login-back">

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

    <body class="login-back">
        <div class="form-wrapper2">
            <div class="container mt-5">
                <h2>Registro de Usuario</h2>


            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>


                <form action="<?= base_url('registrar') ?>" method="POST" novalidate>
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= old('nombre') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?= old('apellidos') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" name="telefono" id="telefono" class="form-control" value="<?= old('telefono') ?>" required pattern="[0-9]{8,15}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" value="<?= old('direccion') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="pais" class="form-label">País</label>
                                <select name="pais" id="pais" class="form-select custom-select">
                                    <option value="">Selecciona un país</option>
                                    <!-- Opciones dinámicas generadas por JS -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" name="contraseña" id="contraseña" class="form-control" required minlength="8">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn-action btn-edit">Registrarse</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>

        <script>
            // Cargar países usando API
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    const paisSelect = document.getElementById('pais');
                    data.forEach(country => {
                        const option = document.createElement('option');
                        option.value = country.name.common;
                        option.textContent = country.name.common;
                        paisSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al cargar países:', error));
        </script>
    </body>

</html>