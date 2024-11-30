<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1><?= esc($title) ?></h1>

    <?php if (!empty($amigos)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>País</th>
                    <th>Último Inicio de Sesión</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($amigos as $amigo): ?>
                    <tr>
                        <td><?= esc($amigo['id']) ?></td>
                        <td><?= esc($amigo['nombre']) ?></td>
                        <td><?= esc($amigo['apellidos']) ?></td>
                        <td><?= esc($amigo['telefono']) ?></td>
                        <td><?= esc($amigo['email']) ?></td>
                        <td><?= esc($amigo['direccion']) ?></td>
                        <td><?= esc($amigo['pais']) ?></td>
                        <td><?= esc($amigo['ultimo_inicio_sesion']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron registros en la tabla amigos.</p>
    <?php endif; ?>
</body>
</html>
