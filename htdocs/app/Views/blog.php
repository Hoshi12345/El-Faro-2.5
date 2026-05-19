<?php
/**
 * @var array $articulos
 */
?>
<h1 class="title titulo-all-articulos">Todos los artículos</h1>

<?php if (!empty($articulos)): ?>
    <div class="columns is-multiline">
        <?php foreach ($articulos as $post): ?>
            <!-- Cambiar is-12 por is-4-desktop is-6-tablet is-12-mobile -->
            <div class="column is-4-desktop is-6-tablet is-12-mobile">
                <!-- Agregar la clase articulo-card -->
                <div class="box articulo-card" data-id="<?=  $post['id'] ?>">
                    <h2 class="title is-4"><?= esc($post['title']) ?></h2>
                    <p class="subtitle is-6">
                        Sección: <?= esc($post['seccion']) ?> | 
                        Categoría: <?= esc($post['categoria'] ?? 'General') ?>
                    </p>
                    <p><?= esc(substr($post['content'], 0, 200)) ?>...</p>
                    <time><?= date('d/m/Y', strtotime($post['created_at'])) ?></time>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Paginación -->
    <?php if (isset($pager)): ?>
        <?= $pager->links() ?>
    <?php endif; ?>
<?php else: ?>
    <p class="label sin-articulos">No hay artículos todavía.</p>
<?php endif; ?>
<script>
    window.articulosData = <?= json_encode($articulos) ?>;
</script>