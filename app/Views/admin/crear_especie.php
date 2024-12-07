<h1><?= $title ?></h1>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
   <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

<body class="login-back">

<form method="post" action="especies/store">
    <?= csrf_field() ?>
    <label for="nombre_comercial">Nombre Comercial:</label>
    <input type="text" name="nombre_comercial" id="nombre_comercial" value="<?= old('nombre_comercial') ?>" required>
    <br>
    <label for="nombre_cientifico">Nombre Científico:</label>
    <input type="text" name="nombre_cientifico" id="nombre_cientifico" value="<?= old('nombre_cientifico') ?>" required>
    <br>
    <button type="submit">Guardar</button>
</form>
</body>