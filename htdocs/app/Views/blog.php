<h1 class="title titulo-all-articulos">Todos los artículos</h1>

<?php if (!empty($articulos)): ?>
    <div class="columns is-multiline">
        <?php foreach ($articulos as $post): ?>
            <div class="column is-12 ">
                <div class="box">
                    <h2 class="title is-4 "><?= esc($post['title']) ?></h2>
                    <p class="subtitle is-6 ">
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
    <?= $pager->links() ?>
<?php else: ?>
    <p class="label sin-articulos">No hay artículos todavía.</p>
<?php endif; ?>