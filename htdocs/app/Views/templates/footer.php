<footer class="footer has-background-grey-lighter">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h4 class="title is-5">El Faro</h4>
                <p>Periódico digital con noticias actualizadas, fundado en 1995.</p>
            </div>
            <div class="column">
                <h4 class="title is-5">Enlaces rápidos</h4>
                <ul>
                    <li><a href="<?= site_url() ?>" class="has-text-info">Inicio</a></li>
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

<footer class="footer has-background-grey-lighter">
    <!-- ... todo el footer que ya tenías ... -->
</footer>

<!-- MODAL PARA NOTICIAS COMPLETAS (UNICO) -->
<div id="articuloModal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title" id="modalTitulo">Cargando...</p>
            <button class="delete" aria-label="close" id="closeModalBtn"></button>
        </header>
        <section class="modal-card-body" id="modalBody">
            <div class="has-text-centered">Cargando...</div>
        </section>
        <footer class="modal-card-foot is-justify-content-space-between">
            <button id="btnAnterior" class="button" disabled>◀ Anterior</button>
            <button id="btnSiguiente" class="button" disabled>Siguiente ▶</button>
        </footer>
    </div>
    <button class="modal-close is-large" aria-label="close" id="closeModalLargeBtn"></button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function(e) {
        const card = e.target.closest('.box.articulo-card');
        if (card) {
            const id = card.dataset.id;
            if (id && typeof cargarYMostrar === 'function') {
                cargarYMostrar(id);
            } else {
                console.warn('No se pudo abrir el modal: cargarYMostrar no está definida o falta id');
            }
        }
    });
});
</script>