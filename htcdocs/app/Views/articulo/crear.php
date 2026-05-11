<h1 class="title titulo-articulo">Nuevo Artículo</h1>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="notification is-danger">
        <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= site_url('articulo/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="field">
        <label class="label th-articulo">Sección:</label>
        <div class="select is-fullwidth">
            <select name="seccion" required>
                <option value="inicio" <?= old('seccion') == 'inicio' ? 'selected' : '' ?>>Inicio</option>
                <option value="deportes" <?= old('seccion') == 'deportes' ? 'selected' : '' ?>>Deportes</option>
                <option value="negocios" <?= old('seccion') == 'negocios' ? 'selected' : '' ?>>Negocios</option>
            </select>
        </div>
    </div>

    <div class="field">
        <label class="label th-articulo">Título:</label>
        <input class="input" type="text" name="title" value="<?= old('title') ?>" required>
    </div>

    <div class="field">
        <label class="label th-articulo">Categoría:</label>
        <input class="input" type="text" name="categoria" value="<?= old('categoria') ?>" required>
    </div>

    <div class="field">
        <label class="label th-articulo">Contenido:</label>
        <textarea class="textarea" name="content" required><?= old('content') ?></textarea>
    </div>

    <div class="field">
        <label class="label th-articulo">Fuente (opcional):</label>
        <input class="input" type="text" name="fuente" value="<?= old('fuente') ?>">
    </div>

    <button type="submit" class="button is-primary">Publicar Artículo</button>
</form>