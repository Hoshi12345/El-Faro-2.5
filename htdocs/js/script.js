// ==========================================
// RELOJ CON FECHA Y HORA
// ==========================================

function actualizarReloj() {
    const ahora = new Date();
    
    const dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    
    const diaSemana = dias[ahora.getDay()];
    const dia = ahora.getDate();
    const mes = meses[ahora.getMonth()];
    const año = ahora.getFullYear();
    
    let horas = ahora.getHours();
    let minutos = ahora.getMinutes();
    let segundos = ahora.getSeconds();
    
    horas = horas < 10 ? '0' + horas : horas;
    minutos = minutos < 10 ? '0' + minutos : minutos;
    segundos = segundos < 10 ? '0' + segundos : segundos;
    
    const fechaString = `${diaSemana}, ${dia} de ${mes} de ${año}`;
    const tiempoString = `${horas}:${minutos}:${segundos}`;
    const textoReloj = `${fechaString} - ${tiempoString}`;
    
    const relojDesktop = document.getElementById('reloj');
    const relojMovil = document.getElementById('reloj-movil');
    
    if (relojDesktop) relojDesktop.textContent = textoReloj;
    if (relojMovil) relojMovil.textContent = textoReloj;
}

actualizarReloj();
setInterval(actualizarReloj, 1000);

// ==========================================
// FUNCIÓN DEL MODO OSCURO (toggle checkbox)
// ==========================================
function setDarkModeFromCheckbox(isDark) {
    // Sincronizar todos los checkboxes con id="darkModeCheckbox"
    const checkboxes = document.querySelectorAll('#darkModeCheckbox');
    checkboxes.forEach(cb => {
        if (cb) cb.checked = isDark;
    });
    
    //  ACTUALIZAR EL TEXTO DEL LABEL (agregado correctamente aquí)
    const labels = document.querySelectorAll('.toggle-label');
    labels.forEach(label => {
        label.textContent = isDark ? ' Modo Oscuro' : ' Modo Claro';
    });
    
    if (isDark) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
}

// ==========================================
// INTERACTIVIDAD GENERAL (incluye toggle)
// ==========================================
document.addEventListener('DOMContentLoaded', () => {
    // ---- Menú hamburguesa (Bulma) ----
    const navbarBurger = document.querySelector('.navbar-burger');
    const navbarMenu = document.getElementById('navMenu');

    if (navbarBurger && navbarMenu) {
        navbarBurger.addEventListener('click', () => {
            navbarBurger.classList.toggle('is-active');
            navbarMenu.classList.toggle('is-active');
        });
    }

    // ---- Scroll suave para enlaces internos ----
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                if (navbarMenu && navbarMenu.classList.contains('is-active')) {
                    navbarMenu.classList.remove('is-active');
                    navbarBurger.classList.remove('is-active');
                }
            }
        });
    });



    // ---- Formulario de contacto ----
    const btnMostrarContacto = document.getElementById('btnMostrarContacto');
    const formContacto = document.getElementById('formulario-contacto');

    if (btnMostrarContacto && formContacto) {
        btnMostrarContacto.addEventListener('click', () => {
            formContacto.classList.toggle('is-hidden');
        });
    }
    
    // ===== Formulario de artículo =====
    const btnMostrarForm = document.getElementById('btnMostrarFormArticulo');
    const formularioArticulo = document.getElementById('formularioArticulo');
    if (btnMostrarForm && formularioArticulo) {
        btnMostrarForm.addEventListener('click', () => {
            formularioArticulo.style.display =
                formularioArticulo.style.display === 'none' ? 'block' : 'none';
        });
    }

    const btnCancelar = document.getElementById('btnCancelarForm');
    if (btnCancelar && formularioArticulo) {
        btnCancelar.addEventListener('click', () => {
            formularioArticulo.style.display = 'none';
        });
    }

    const formNuevoArticulo = document.getElementById('formNuevoArticulo');
    if (formNuevoArticulo) {
        formNuevoArticulo.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(formNuevoArticulo);
            try {
                const response = await fetch(formNuevoArticulo.action, {
                    method: 'POST',
                    body: formData
                });
                if (response.ok) {
                    const result = await response.json();
                    if (result.success) {
                        alert('¡Artículo publicado con éxito!');
                        formNuevoArticulo.reset();
                        formularioArticulo.style.display = 'none';
                        location.reload();
                    } else {
                        alert('Error: ' + (result.message || 'No se pudo publicar'));
                    }
                } else {
                    alert('Error al publicar el artículo');
                }
            } catch (error) {
                console.error(error);
                alert('Error de conexión');
            }
        });
    }

    // ===== MODO OSCURO CON TOGGLE =====
    // Aplicar estado guardado al cargar
    const savedMode = localStorage.getItem('darkMode');
    setDarkModeFromCheckbox(savedMode === 'enabled');
    
    // Asignar evento a todos los checkboxes
    document.querySelectorAll('#darkModeCheckbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            setDarkModeFromCheckbox(this.checked);
        });
    });
});

/// ==========================================
// MODAL SIMPLIFICADO (con navegación)
// ==========================================
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('articuloModal');
    const modalBody = document.getElementById('modalBody');
    const modalTitle = document.getElementById('modalTitulo');
    const btnAnterior = document.getElementById('btnAnterior');
    const btnSiguiente = document.getElementById('btnSiguiente');
    
    let currentCard = null;

    async function cargarYMostrar(id) {
        if (!id) return;
        modalBody.innerHTML = '<div class="has-text-centered">Cargando...</div>';
        modalTitle.textContent = 'Cargando...';
        modal.classList.add('is-active');
        
        try {
            const response = await fetch(BASE_URL + 'index.php/articulo/getArticulo/' + id);
            if (!response.ok) throw new Error('HTTP ' + response.status);
            const data = await response.json();
            
            const fecha = data.created_at ? new Date(data.created_at).toLocaleDateString('es-ES') : 'Sin fecha';
            const imagenUrl = window.location.origin + '/el-faro 3.0/uploads/articulos/' + (data.imagen || 'default.jpg');
            
            const html = `
                <div class="modal-image-container">
                    <img src="${imagenUrl}" alt="${escapeHtml(data.title)}" class="modal-image">
                </div>
                <div class="categoria-tag">
                    <span class="tag is-primary">${escapeHtml(data.categoria || 'General')}</span>
                    <span class="tag is-info">${escapeHtml(data.seccion || 'Inicio')}</span>
                </div>
                <h2 class="title is-3 mt-3">${escapeHtml(data.title)}</h2>
                <div class="metadata mb-3">
                    <time>📅 ${fecha}</time>
                    ${data.fuente ? `<span class="fuente ml-3">📰 Fuente: ${escapeHtml(data.fuente)}</span>` : ''}
                </div>
                <div class="content">
                    ${escapeHtml(data.content).replace(/\n/g, '<br>')}
                </div>
            `;
            modalBody.innerHTML = html;
            modalTitle.textContent = data.title;
            
            // Actualizar los botones basados en los hermanos de la card actual
            if (currentCard) {
                const prevCard = currentCard.parentElement.previousElementSibling?.querySelector('.box.articulo-card');
                const nextCard = currentCard.parentElement.nextElementSibling?.querySelector('.box.articulo-card');
                btnAnterior.disabled = !prevCard;
                btnSiguiente.disabled = !nextCard;
                // Guardar referencias para navegación
                btnAnterior.onclick = () => { if (prevCard) cargarYMostrar(prevCard.dataset.id); };
                btnSiguiente.onclick = () => { if (nextCard) cargarYMostrar(nextCard.dataset.id); };
            }
        } catch (error) {
            modalBody.innerHTML = '<div class="notification is-danger">Error al cargar la noticia: ' + error.message + '</div>';
            modalTitle.textContent = 'Error';
        }
    }

    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }

    // Al hacer clic en una card
    document.body.addEventListener('click', function(e) {
        const card = e.target.closest('.box.articulo-card');
        if (!card) return;
        e.preventDefault();
        currentCard = card;
        const id = card.dataset.id;
        if (id) cargarYMostrar(id);
    });

    // Cerrar modal
    const closeModal = () => modal.classList.remove('is-active');
    document.getElementById('closeModalBtn')?.addEventListener('click', closeModal);
    document.getElementById('closeModalLargeBtn')?.addEventListener('click', closeModal);
    modal?.querySelector('.modal-background')?.addEventListener('click', closeModal);
});