<?php
/**
 * @var array $destacados
 * @var array $inicio
 * @var array $deportes
 * @var array $negocios
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódico El Faro</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<div class="has-background-warning has-text-centered py-2">
    <span class="icon-text">
        <span class="icon">📢</span>
        <span><strong>Aviso importante:</strong> Nuevos horarios de atención al público. ¡Suscríbete a nuestro newsletter!</span>
    </span>
</div>

<!-- HEADERS (móvil y escritorio) igual que antes -->
<header class="has-background-info py-4 is-hidden-tablet">
  <div class="container has-text-centered">
    <figure class="image is-64x64 is-inline-block">
      <img src="https://img.freepik.com/vector-premium/pintura-faro-cielo-azul-ola-fondo_646696-5260.jpg" alt="Logo El Faro" class="is-rounded logo-faro">
    </figure>
    <h1 class="title is-4 has-text-black mt-2">Bienvenidos a periódico El Faro</h1>
    <div id="reloj-movil" class="tag is-dark is-medium mt-2">00:00:00</div>
  </div>
  <div><button class="button toggle-dark mode is-light mt-2" onclick="myFunction()">Toggle Dark Mode</button></div>
</header>

<header class="has-background-info py-4 is-hidden-mobile">
  <div class="container">
    <div class="level is-mobile is-align-items-center">
      <div class="level-left">
        <div class="level-item">
          <figure class="image is-64x64 mr-3">
            <img src="https://img.freepik.com/vector-premium/pintura-faro-cielo-azul-ola-fondo_646696-5260.jpg" alt="Logo El Faro" class="is-rounded logo-faro">
          </figure>
        </div>
        <div class="level-item">
          <h1 class="title is-4 has-text-black">Bienvenidos a periódico El Faro</h1>
        </div>
      </div>
      <div class="level-right">
        <div class="level-item">
          <div id="reloj" class="tag is-dark is-medium">00:00:00</div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- NAV (enlaces actualizados) -->
<nav class="navbar is-info is-light" role="navigation">
    <div class="container">
        <div class="navbar-brand">
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item has-text-weight-semibold" href="#inicio">INICIO</a>
                <a class="navbar-item has-text-weight-semibold" href="#deportes">DEPORTES</a>
                <a class="navbar-item has-text-weight-semibold" href="#negocios">NEGOCIOS</a>
                <a class="navbar-item" href="<?= site_url('blog') ?>">BLOG</a>
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <a href="<?= site_url('articulo/crear') ?>" class="button is-white is-outlined">➕ Agregar Nuevo Artículo</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<main class="container my-5">

    

    <!-- DESTACADOS -->
    <section id="destacados" class="mb-6">
        <h2 class="title is-2 has-text-centered">🔥 Noticias Destacadas</h2>
        <div class="columns is-multiline">
            <?php if (!empty($destacados)): ?>
                <?php foreach ($destacados as $post): ?>
                    <div class="column is-12-mobile is-6-tablet is-4-desktop">
                        <div class="box articulo-card">
                            <span class="tag is-primary is-light mb-2"><?= esc((string)($post['categoria'] ?? 'General')) ?></span>
                            <h3 class="title is-5"><?= esc((string)$post['title']) ?></h3>
                            <p class="subtitle is-6"><?= esc(substr($post['content'], 0, 120)) ?>...</p>
                            <div class="is-size-7 has-text-grey mt-auto">
                                <time><?= date('d/m/Y', strtotime($post['created_at'])) ?></time>
                                <?php if (!empty($post['fuente'])): ?>
                                    | <span><?= esc((string)$post['fuente']) ?></span>
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
                        <div class="box articulo-card">
                            <span class="tag is-primary is-light mb-2"><?= esc((string)($post['categoria'] ?? 'General')) ?></span>
                            <h3 class="title is-6"><?= esc((string)$post['title']) ?></h3>
                            <p class="is-size-7"><?= esc(substr($post['content'], 0, 100)) ?>...</p>
                            <p class="is-size-7 has-text-grey mt-2"><?= date('d/m/Y', strtotime($post['created_at'])) ?></p>
                            <?php if (!empty($post['fuente'])): ?>
                                | <span><?= esc((string)$post['fuente']) ?></span>
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
                        <div class="box articulo-card">
                            <span class="tag is-primary is-light mb-2"><?= esc((string)($post['categoria'] ?? 'General')) ?></span>
                            <h3 class="title is-6"><?= esc((string)$post['title']) ?></h3>
                            <p class="is-size-7"><?= esc(substr($post['content'], 0, 100)) ?>...</p>
                            <p class="is-size-7 has-text-grey mt-2"><?= date('d/m/Y', strtotime($post['created_at'])) ?></p>
                            <?php if (!empty($post['fuente'])): ?>
                                | <span><?= esc((string)$post['fuente']) ?></span>
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
                        <div class="box articulo-card">
                            <span class="tag is-primary is-light mb-2"><?= esc((string)($post['categoria'] ?? 'General')) ?></span>
                            <h3 class="title is-6"><?= esc((string)$post['title']) ?></h3>
                            <p class="is-size-7"><?= esc(substr($post['content'], 0, 100)) ?>...</p>
                            <p class="is-size-7 has-text-grey mt-2"><?= date('d/m/Y', strtotime($post['created_at'])) ?></p>
                            <?php if (!empty($post['fuente'])): ?>
                                | <span><?= esc((string)$post['fuente']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="has-text-grey">No hay artículos en esta sección.</p>
            <?php endif; ?>
        </div>
    </section>

   <!-- CONTACTO Y AVISOS (igual que antes) -->
 <section id="contacto" class="mb-6">
    <h2 class="title is-3 contacto-titulo">Contacto</h2>
    <a href="<?= site_url('contacto') ?>" class="button is-link">📧 Ir al formulario de contacto</a>
</section>

    <section id="avisos" class="mb-6">
        <h2 class="title is-3">📢 Avisos y Eventos</h2>
        <div class="notification is-warning">Próximo evento: Feria del Libro - 20 de abril. ¡Participa!</div>
        <div class="notification is-info">Vacaciones de invierno: horarios especiales del 10 al 20 de julio.</div>
    </section>

</main>

<footer class="footer has-background-grey-lighter">
    <!-- footer igual que en blog.php -->
    <div class="container">
        <div class="columns">
            <div class="column">
                <h4 class="title is-5">El Faro</h4>
                <p>Periódico digital con noticias actualizadas, fundado en 1995.</p>
            </div>
            <div class="column">
                <h4 class="title is-5">Enlaces rápidos</h4>
                <ul>
                    <li><a href="<?= site_url('/') ?>" class="has-text-info">Inicio</a></li>
                    <li><a href="<?= site_url('blog') ?>" class="has-text-info">Blog</a></li>
                    <li><a href="#contacto" class="has-text-info">Contacto</a></li>
                    <li><a href="#avisos" class="has-text-info">Avisos</a></li>
                </ul>
            </div>
            <div class="column">
                <h4 class="title is-5">Síguenos</h4>
                <div class="buttons are-small">
                    <a class="button is-dark">Facebook</a>
                    <a class="button is-dark">Twitter</a>
                    <a class="button is-dark">Instagram</a>
                </div>
            </div>
            <div class="column">
                <h4 class="title is-5">Contacto</h4>
                <p><strong>Email:</strong> contacto@elfaro.cl</p>
                <p><strong>Teléfono:</strong> +56 2 1234 5678</p>
            </div>
        </div>
        <div class="has-text-centered mt-4">
            <p>© 2026 El Faro - Todos los derechos reservados</p>
        </div>
    </div>
</footer>

<script src="<?= base_url('js/script.js') ?>"></script>
</body>
</html>