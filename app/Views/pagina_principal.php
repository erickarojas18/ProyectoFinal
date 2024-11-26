<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>
<body class="login-background">
    <div class="login-container">
        <button type="button" class="start-now" onclick="openModal()">Start Now</button>
    </div>

    <!-- Modal -->
    <div id="loginModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="login-container">
                <form class="login-form" action="<?= base_url('login/autenticar') ?>" method="POST">
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

                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

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
