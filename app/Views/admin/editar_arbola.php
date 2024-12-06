<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Árbol Comprado</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-back">
    
<div class="container mt-5">
    <div class="form-wrapper">
        <h1>Editar Árbol Comprado</h1>

        <!-- Mostrar mensaje si está presente -->
        <?php if (!empty($msg)): ?>
            <div class="alert alert-success" role="alert">
                <?= htmlspecialchars($msg); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario de Edición -->
        <form action="<?= base_url("Compras/update/{$tree['arbol_id']}"); ?>" method="post">
            <div class="form-group">
                <label for="arbol_id">ID del Árbol</label>
                <input type="text" class="form-control" id="arbol_id" name="arbol_id" value="<?= htmlspecialchars($tree['arbol_id']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="amigo_id">ID del Amigo</label>
                <input type="text" class="form-control" id="amigo_id" name="amigo_id" value="<?= htmlspecialchars($tree['amigo_id']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="fecha_compra">Fecha de Compra</label>
                <input type="date" class="form-control" id="fecha_compra" name="fecha_compra" value="<?= htmlspecialchars($tree['fecha_compra']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Árbol</button>
        </form>

    </div>
</div>
</body>
</html>
