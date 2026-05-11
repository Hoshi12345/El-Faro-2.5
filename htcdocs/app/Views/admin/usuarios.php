<?= $this->include('templates/header') ?>

<h1 class="title admin-titulo">Usuarios registrados (contacto)</h1>

<table class="table is-fullwidth is-striped tabla-usuarios">
    <thead>
        <tr>
            <th class="th-usuarios">Nombre</th>
            <th class="th-usuarios">Email</th>
            <th class="th-usuarios">Teléfono</th>
            <th class="th-usuarios">Mensaje</th>
            <th class="th-usuarios">Fecha</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= esc($usuario['nombre']) ?></td>
            <td><?= esc($usuario['email']) ?></td>
            <td><?= esc($usuario['telefono']) ?></td>
            <td><?= esc(substr($usuario['mensaje'], 0, 50)) ?></td>
            <td><?= $usuario['fecha_registro'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $this->include('templates/footer') ?>