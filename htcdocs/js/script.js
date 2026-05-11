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
// INTERACTIVIDAD GENERAL
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
    
    // ===== NUEVO: Formulario de artículo =====
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
});