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
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>

<!-- Banner de aviso (opcional) -->
<div class="has-background-warning has-text-centered py-2">
    <span class="icon-text">
        <span class="icon">📢</span>
        <span><strong>Aviso importante:</strong> Nuevos horarios de atención al público. ¡Suscríbete a nuestro newsletter!</span>
    </span>
</div>

<header class="has-background-info py-4 is-hidden-tablet">
  <div class="container has-text-centered">
    <figure class="image is-64x64 is-inline-block" style="position: relative;">
      <img src="https://img.freepik.com/vector-premium/pintura-faro-cielo-azul-ola-fondo_646696-5260.jpg" alt="Logo El Faro" class="is-rounded logo-faro">
        <div class="faro-luz" ></div>
    </figure>
    <h1 class="title is-4 title-bienvenida mt-2">Bienvenidos a periódico El Faro</h1>
    <div id="reloj-movil" class="tag is-dark is-medium mt-2">00:00:00</div>
    <!-- Toggle modo oscuro móvil -->
    <div class="dark-mode-toggle mt-2">
      <label class="switch">
    <input type="checkbox" id="darkModeCheckbox">
    <span class="slider round"></span>
</label>
<span class="toggle-label">☀️ Modo Claro</span>
</label>
    </div>
  </div>
</header>

<header class="has-background-info py-4 is-hidden-mobile">
  <div class="container">
    <div class="level is-mobile is-align-items-center">
      <div class="level-left">
        <div class="level-item">
          <figure class="image is-64x64 mr-3" style="position: relative;">
            <img src="https://img.freepik.com/vector-premium/pintura-faro-cielo-azul-ola-fondo_646696-5260.jpg" alt="Logo El Faro" class="is-rounded logo-faro">
            <div class="faro-luz"></div>
          </figure>
        </div>
        <div class="level-item">
          <h1 class="title is-4 title-bienvenida has-text-black">Bienvenidos a periódico El Faro</h1>
        </div>
      </div>
      <div class="level-right">
        <div class="level-item">
          <div id="reloj" class="tag is-dark is-medium">00:00:00</div>
        </div>
        <div class="level-item">
          <!-- Toggle modo oscuro escritorio -->
          <div class="dark-mode-toggle">
            <label class="switch">
    <input type="checkbox" id="darkModeCheckbox">
    <span class="slider round">
        <span class="icon-sun">☀️</span>
        <span class="icon-moon">🌙</span>
    </span>
</label>
<span class="toggle-label">Modo Oscuro</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- NAVBAR (común) -->
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
                <a class="navbar-item has-text-weight-semibold" href="<?= base_url() ?>">INICIO</a>
                <a class="navbar-item has-text-weight-semibold" href="<?= base_url() ?>#deportes">DEPORTES</a>
                <a class="navbar-item has-text-weight-semibold" href="<?= base_url() ?>#negocios">NEGOCIOS</a>
                <a class="navbar-item" href="<?= site_url('blog') ?>">Blog</a>
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <a class="navbar-item" href="<?= site_url('articulo/crear') ?>">➕ Agregar Nuevo Artículo</a>
                </div>
            </div>
        </div>
    </div>
</nav>
