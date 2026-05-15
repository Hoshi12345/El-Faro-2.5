<?php
/**
 * @var array $destacados
 * @var array $inicio
 * @var array $deportes
 * @var array $negocios
 */

// Define a fallback base_url if not available (e.g., if CodeIgniter isn't loaded)
if (!function_exists('base_url')) {
    function base_url($uri = '') {
        $base = 'http://localhost/yourproject/'; // Replace with your actual base URL
        return $base . ltrim($uri, '/');
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódico El Faro</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
<!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
<!-- Tu CSS personalizado (opcional) -->
    <link rel="stylesheet" href="<?= base_url('css/styles.css?v=1.935') ?>">

</head>
<body >

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
           <!-- Botón modo oscuro (estilos inline para probar) -->
<button id="darkModeToggle" style="background: #007bff; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer; margin-top: 5px;">
    🌙 Modo Oscuro
</button>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('darkModeToggle');
        if (!btn) return;
        btn.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                btn.textContent = '☀️ Modo Claro';
                localStorage.setItem('darkMode', 'enabled');
            } else {
                btn.textContent = '🌙 Modo Oscuro';
                localStorage.setItem('darkMode', 'disabled');
            }
        });
        // Recuperar estado guardado
        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
            btn.textContent = '☀️ Modo Claro';
        }
    });
</script>
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
                <a class="navbar-item has-text-weight-semibold" href="<?= site_url('index.php') ?>">INICIO</a>
                <!-- <a class="navbar-item has-text-weight-semibold" href="#deportes">DEPORTES</a> 
                <a class="navbar-item has-text-weight-semibold" href="#negocios">NEGOCIOS</a> -->
		<a class="navbar-item" href="<?= site_url('blog') ?>">Blog</a>
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