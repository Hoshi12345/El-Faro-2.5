<?php
/**
 * @var array $destacados
 * @var array $inicio
 * @var array $deportes
 * @var array $negocios
 */
?>

<!-- DESTACADOS -->
<section id="destacados" class="mb-6">
    <h2 class="title is-2 has-text-centered">🔥 Noticias Destacadas</h2>
    <div class="columns is-multiline">
        <?php if (!empty($destacados)): ?>
            <?php foreach ($destacados as $post): ?>
                <div class="column is-12-mobile is-6-tablet is-4-desktop">
                    <div class="box articulo-card" data-id="<?=  $post['id'] ?>">
                        <?php if (!empty($post['imagen'])): ?>
                            <div class="card-image">
                                <img src="<?= base_url('uploads/articulos/' . $post['imagen']) ?>" 
                                     alt="<?= esc($post['title']) ?>"
                                     class="card-img">
                            </div>
                        <?php else: ?>
                            <div class="card-image">
                                <img src="<?= base_url('uploads/articulos/default.jpg') ?>" 
                                     alt="Imagen por defecto"
                                     class="card-img">
                            </div>
                        <?php endif; ?>
                        
                        <span class="tag is-primary is-light mb-2"><?= esc($post['categoria'] ?? 'General') ?></span>
                        <h3 class="title is-5"><?= esc($post['title']) ?></h3>
                        <p class="subtitle is-6"><?= esc(substr($post['content'], 0, 120)) ?>...</p>
                        <div class="is-size-7 has-text-grey mt-auto">
                            <time><?= date('d/m/Y', strtotime($post['created_at'])) ?></time>
                            <?php if (!empty($post['fuente'])): ?>
                                | <span><?= esc($post['fuente']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="has-text-grey">No hay noticias destacadas.</p>
        <?php endif; ?>
    </div>
</section>

<!-- SECCIÓN INICIO -->
<section id="inicio" class="mb-6">
    <h2 class="title is-3">Sección Inicio - Noticias generales</h2>
    <div class="tags has-addons mb-3">
        <span class="tag is-dark">Cantidad de artículos:</span>
        <span class="tag is-info"><?= count($inicio) ?></span>
    </div>
    <div class="columns is-multiline">
        <?php if (!empty($inicio)): ?>
            <?php foreach ($inicio as $post): ?>
                <div class="column is-12-mobile is-6-tablet is-4-desktop">
                    <div class="box articulo-card" data-id="<?=  $post['id'] ?>">
                        <!-- IMAGEN agregada aquí -->
                        <?php if (!empty($post['imagen'])): ?>
                            <div class="card-image">
                                <img src="<?= base_url('uploads/articulos/' . $post['imagen']) ?>" 
                                     alt="<?= esc($post['title']) ?>"
                                     class="card-img">
                            </div>
                        <?php else: ?>
                            <div class="card-image">
                                <img src="<?= base_url('uploads/articulos/default.jpg') ?>" 
                                     alt="Imagen por defecto"
                                     class="card-img">
                            </div>
                        <?php endif; ?>
                        
                        <span class="tag is-primary is-light mb-2"><?= esc($post['categoria'] ?? 'General') ?></span>
                        <h3 class="title is-6"><?= esc($post['title']) ?></h3>
                        <p class="is-size-7"><?= esc(substr($post['content'], 0, 100)) ?>...</p>
                        <p class="is-size-7 has-text-grey mt-2"><?= date('d/m/Y', strtotime($post['created_at'])) ?></p>
                        <?php if (!empty($post['fuente'])): ?>
                            | <span><?= esc($post['fuente']) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="has-text-grey">No hay artículos en esta sección.</p>
        <?php endif; ?>
    </div>
</section>

<!-- SECCIÓN DEPORTES -->
<section id="deportes" class="mb-6">
    <h2 class="title is-3">Sección Deportes</h2>
    <div class="tags has-addons mb-3">
        <span class="tag is-dark">Cantidad de artículos:</span>
        <span class="tag is-info"><?= count($deportes) ?></span>
    </div>
    <div class="columns is-multiline">
        <?php if (!empty($deportes)): ?>
            <?php foreach ($deportes as $post): ?>
                <div class="column is-12-mobile is-6-tablet is-4-desktop">
                    <div class="box articulo-card" data-id="<?=  $post['id'] ?>">
                        <!-- IMAGEN agregada aquí -->
                        <?php if (!empty($post['imagen'])): ?>
                            <div class="card-image">
                                <img src="<?= base_url('uploads/articulos/' . $post['imagen']) ?>" 
                                     alt="<?= esc($post['title']) ?>"
                                     class="card-img">
                            </div>
                        <?php else: ?>
                            <div class="card-image">
                                <img src="<?= base_url('uploads/articulos/default.jpg') ?>" 
                                     alt="Imagen por defecto"
                                     class="card-img">
                            </div>
                        <?php endif; ?>
                        
                        <span class="tag is-primary is-light mb-2"><?= esc($post['categoria'] ?? 'General') ?></span>
                        <h3 class="title is-6"><?= esc($post['title']) ?></h3>
                        <p class="is-size-7"><?= esc(substr($post['content'], 0, 100)) ?>...</p>
                        <p class="is-size-7 has-text-grey mt-2"><?= date('d/m/Y', strtotime($post['created_at'])) ?></p>
                        <?php if (!empty($post['fuente'])): ?>
                            | <span><?= esc($post['fuente']) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="has-text-grey">No hay artículos en esta sección.</p>
        <?php endif; ?>
    </div>
</section>

<!-- SECCIÓN NEGOCIOS -->
<section id="negocios" class="mb-6">
    <h2 class="title is-3">Sección Negocios</h2>
    <div class="tags has-addons mb-3">
        <span class="tag is-dark">Cantidad de artículos:</span>
        <span class="tag is-info"><?= count($negocios) ?></span>
    </div>
    <div class="columns is-multiline">
        <?php if (!empty($negocios)): ?>
            <?php foreach ($negocios as $post): ?>
                <div class="column is-12-mobile is-6-tablet is-4-desktop">
                    <div class="box articulo-card" data-id="<?=  $post['id'] ?>">
                        <!-- IMAGEN agregada aquí -->
                        <?php if (!empty($post['imagen'])): ?>
                            <div class="card-image">
                                <img src="<?= base_url('uploads/articulos/' . $post['imagen']) ?>" 
                                     alt="<?= esc($post['title']) ?>"
                                     class="card-img">
                            </div>
                        <?php else: ?>
                            <div class="card-image">
                                <img src="<?= base_url('uploads/articulos/default.jpg') ?>" 
                                     alt="Imagen por defecto"
                                     class="card-img">
                            </div>
                        <?php endif; ?>
                        
                        <span class="tag is-primary is-light mb-2"><?= esc($post['categoria'] ?? 'General') ?></span>
                        <h3 class="title is-6"><?= esc($post['title']) ?></h3>
                        <p class="is-size-7"><?= esc(substr($post['content'], 0, 100)) ?>...</p>
                        <p class="is-size-7 has-text-grey mt-2"><?= date('d/m/Y', strtotime($post['created_at'])) ?></p>
                        <?php if (!empty($post['fuente'])): ?>
                            | <span><?= esc($post['fuente']) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="has-text-grey">No hay artículos en esta sección.</p>
        <?php endif; ?>
    </div>
</section>

<!-- CONTACTO Y AVISOS -->
<section id="contacto" class="mb-6">
    <h2 class="title is-3 contacto-titulo">Contacto</h2>
    <a href="<?= site_url('contacto') ?>" class="button is-link">📧 Ir al formulario de contacto</a>
</section>

<section id="avisos" class="mb-6">
    <h2 class="title is-3">📢 Avisos y Eventos</h2>
    <div class="notification is-warning">Próximo evento: Feria del Libro - 20 de abril. ¡Participa!</div>
    <div class="notification is-info">Vacaciones de invierno: horarios especiales del 10 al 20 de julio.</div>
</section>
<!-- script que recopila datos para todas las noticias modal -->
   <script>
    window.articulosData = <?= json_encode(array_merge($destacados, $inicio, $deportes, $negocios)) ?>;
</script>
