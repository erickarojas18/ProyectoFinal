<h1><?= $title ?></h1>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

<body class="login-back">
    <div class="login-container">
        <div class="form-wrapper">

            <form method="post" action="<?= site_url('Especies/store') ?>">
                <?= csrf_field() ?>
                <div class="form-group">
                <label for="nombre_comercial">Nombre Comercial:</label>
                <select name="nombre_comercial" id="nombre_comercial" required>
                    <option value="">Seleccione un nombre comercial</option>
                    <?php foreach ($nombresComerciales as $nombreComercial): ?>
                        <option value="<?= esc($nombreComercial) ?>" <?= old('nombre_comercial') == $nombreComercial ? 'selected' : '' ?>>
                            <?= esc($nombreComercial) ?>
                        </option>
                    <?php endforeach; ?>

                </select>
                <br>
                </div>
                <div class="form-group">
                <label for="nombre_cientifico">Nombre Científico:</label>
                <select name="nombre_cientifico" id="nombre_cientifico" required>
                    <option value="">Seleccione un nombre científico</option>
                    <?php foreach ($nombresCientificos as $nombreCientifico): ?>
                        <option value="<?= esc($nombreCientifico) ?>" <?= old('nombre_cientifico') == $nombreCientifico ? 'selected' : '' ?>>
                            <?= esc($nombreCientifico) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
            </form>
        </div>
    </div>
</body>