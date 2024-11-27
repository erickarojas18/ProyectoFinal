<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-background">
    <!-- Menú de navegación -->
    <ul class="nav" id="navId">
        <li class="nav-item">
            <a href="<?= base_url('usuarios/registrar') ?>" class="nav-link">Signup</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('login') ?>" class="nav-link">Login</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('logout') ?>" class="nav-link">Logout</a>
        </li>
    </ul>
        <button type="button" class="start-now" onclick="openModal()">Start Now</button>

    <!-- Modal -->
    <div id="loginModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="login-container">
                <form class="login-form" action="<?= base_url('Login/autenticar') ?>" method="POST">
                    <h1 class="text-center">Login</h1>

                    <?php if (!empty($error_msg)): ?>
                        <div class="alert alert-danger">
                            <?= esc($error_msg) ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>

                    <button type="submit" class="btn">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function openModal() {
            const modal = document.getElementById("loginModal");
            if (modal) modal.style.display = "block";
        }

        function closeModal() {
            const modal = document.getElementById("loginModal");
            if (modal) modal.style.display = "none";
        }

        window.onclick = function(event) {
            const modal = document.getElementById("loginModal");
            if (event.target === modal) closeModal();
        }

        <?php if (!empty($error_msg)): ?>
        window.onload = function() {
            openModal();
        };
        <?php endif; ?>
    </script>
</body>
</html>