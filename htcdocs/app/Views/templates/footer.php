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
                    <li><a href="<?= site_url('contacto') ?>" class="has-text-info">Contacto</a></li>
                    <li><a href="<?= site_url('admin/usuarios') ?>" class="has-text-info">Usuarios Registrados</a></li>
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

<script src="/js/script.js"></script>
</body>
</html>