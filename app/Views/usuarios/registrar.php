<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-back ">
    <div class="login-container">
        <div class="form-wrapper">
            <h1 class="text-center">Registro de Usuario</h1>
            <form class="signup-form" action="<?php echo site_url('Usuarios/registrar'); ?>" method="POST" novalidate>
                <div class="form-row">
                    <!-- Columna izquierda -->
                    <div class="form-column">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required pattern="[0-9]{10,15}">
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo" required>
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa tu dirección" required>
                        </div>
                    </div>

                    <!-- Columna derecha -->
                    <div class="form-column">
                        <div class="form-group">
                            <label for="pais">País</label>
                            <select class="form-control" id="pais" name="pais" required>
                                <option value="">Selecciona un país</option>
                            
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Crea una contraseña" required minlength="8">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Cargar países usando la API
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

