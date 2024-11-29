<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-back ">
    <div class="welcome-message">
        Bienvenido Administrador, <?= esc($user_name) ?>!
    </div>

    <div id="content-container"></div>

    <script>
        // Función para mostrar/ocultar el submenú al hacer clic
        function toggleMenu(event) {
            event.preventDefault(); // Evitar recarga de página
            const submenu = event.target.nextElementSibling;

            // Cerrar otros submenús abiertos
            document.querySelectorAll('.submenu.show').forEach(menu => {
                if (menu !== submenu) {
                    menu.classList.remove('show');
                }
            });

            // Mostrar u ocultar el submenú seleccionado
            submenu.classList.toggle('show');
        }

        // Función para cargar el contenido en el contenedor
        function loadContent(page) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', page, true);
            xhr.onload = function() {
                if (this.status === 200) {
                    document.getElementById('content-container').innerHTML = this.responseText;
                } else {
                    document.getElementById('content-container').innerHTML = '<p>Error al cargar el contenido.</p>';
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
