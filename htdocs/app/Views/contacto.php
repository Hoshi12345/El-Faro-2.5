

<h1 class="title contacto-titulo">Contacto</h1>

<?php if (session()->getFlashdata('mensaje')): ?>
    <div class="notification is-success">
        <?= session()->getFlashdata('mensaje') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="notification is-danger">
        <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= site_url('contacto/enviar') ?>" method="post">
    <?= csrf_field() ?>

    <div class="field">
        <label class="label contacto-label">Nombre</label>
        <div class="control">
            <input class="input" type="text" name="nombre" value="<?= old('nombre') ?>" required>
        </div>
    </div>

    <div class="field">
        <label class="label contacto-label">Email</label>
        <div class="control">
            <input class="input" type="email" name="email" value="<?= old('email') ?>">
        </div>
    </div>

    <div class="field">
        <label class="label contacto-label">Teléfono</label>
        <div class="control">
            <input class="input" type="text" name="telefono" value="<?= old('telefono') ?>">
        </div>
    </div>

    <div class="field">
        <label class="label contacto-label">Mensaje</label>
        <div class="control">
            <textarea class="textarea" name="mensaje" required><?= old('mensaje') ?></textarea>
        </div>
    </div>

    <div class="field">
        <button type="submit" class="button is-primary">Enviar mensaje</button>
    </div>
</form>
