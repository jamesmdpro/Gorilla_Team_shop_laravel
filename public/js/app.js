let menuVisible = false;
//Función que oculta o muestra el menu
function mostrarOcultarMenu(){
    if(menuVisible){
        document.getElementById("nav").classList ="";
        menuVisible = false;
    }else{
        document.getElementById("nav").classList ="responsive";
        menuVisible = true;
    }
}
function seleccionar(){
    //oculto el menu una vez que selecciono una opcion
    document.getElementById("nav").classList = "";
    menuVisible = false;
}

// Contador de tiempo hasta el 30/03/2025
document.addEventListener('DOMContentLoaded', function() {
    // Fecha objetivo: 30 de marzo de 2025
    const targetDate = new Date('2025-07-30T00:00:00').getTime();
    
    // Actualizar el contador cada segundo
    const countdown = setInterval(function() {
        // Fecha actual
        const now = new Date().getTime();
        
        // Diferencia entre la fecha objetivo y la actual
        const distance = targetDate - now;
        
        // Cálculos para días, horas, minutos y segundos
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Mostrar los resultados en los elementos correspondientes
        if (document.getElementById('days')) {
            document.getElementById('days').innerHTML = days.toString().padStart(2, '0');
            document.getElementById('hours').innerHTML = hours.toString().padStart(2, '0');
            document.getElementById('minutes').innerHTML = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').innerHTML = seconds.toString().padStart(2, '0');
        }
        
        // Si la cuenta regresiva ha terminado, mostrar un mensaje
        if (distance < 0) {
            clearInterval(countdown);
            if (document.getElementById('countdown')) {
                document.getElementById('countdown').innerHTML = '<h3 class="expired">¡EL MOMENTO HA LLEGADO!</h3>';
            }
        }
    }, 1000);
    
    // Inicializar el formulario pop-up si existe el botón
    const btnInscripcion = document.getElementById('btn-inscripcion');
    if (btnInscripcion) {
        btnInscripcion.addEventListener('click', abrirFormulario);
    }
});

// Funciones para el formulario pop-up
function abrirFormulario() {
    const overlay = document.getElementById('overlay-formulario');
    overlay.style.display = 'flex';
    document.body.style.overflow = 'hidden'; // Evitar scroll
}

function cerrarFormulario() {
    const overlay = document.getElementById('overlay-formulario');
    overlay.style.display = 'none';
    document.body.style.overflow = 'auto'; // Restaurar scroll
}

// Esta función ya no se usa ya que el formulario ahora se envía directamente al backend
// El formulario ahora usa el método POST para enviar los datos al controlador
function enviarFormulario(event) {
    // No prevenimos el evento por defecto para permitir que el formulario se envíe normalmente
    // Obtener los datos del formulario
    const formData = new FormData(document.getElementById('formulario-inscripcion'));
    const userData = {};
    
    for (let [key, value] of formData.entries()) {
        userData[key] = value;
    }
    
    // Guardar los datos en localStorage para usarlos en la página del reto
    localStorage.setItem('userData', JSON.stringify(userData));
    
    // El formulario se enviará a la ruta definida en el atributo action
    // y el controlador se encargará de la redirección
}

// Funciones para la galería de imágenes
function ampliarImagen(img) {
    const modal = document.getElementById('modal-imagen');
    const imagenAmpliada = document.getElementById('imagen-ampliada');
    
    // Establecer la imagen ampliada
    imagenAmpliada.src = img.src;
    imagenAmpliada.alt = img.alt;
    
    // Mostrar el modal
    modal.style.display = 'block';
    
    // Deshabilitar el scroll del body
    document.body.style.overflow = 'hidden';
}

function cerrarModal() {
    const modal = document.getElementById('modal-imagen');
    
    // Ocultar el modal
    modal.style.display = 'none';
    
    // Habilitar el scroll del body
    document.body.style.overflow = 'auto';
}

// Cerrar el modal al hacer clic fuera de la imagen
window.addEventListener('click', function(event) {
    const modal = document.getElementById('modal-imagen');
    if (event.target == modal) {
        cerrarModal();
    }
});

// Cerrar el modal con la tecla ESC
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        cerrarModal();
    }
});

// Funciones para la galería de imágenes
function ampliarImagen(img) {
    const modal = document.getElementById('modal-imagen');
    const imagenAmpliada = document.getElementById('imagen-ampliada');
    
    // Establecer la imagen ampliada
    imagenAmpliada.src = img.src;
    imagenAmpliada.alt = img.alt;
    
    // Mostrar el modal
    modal.style.display = 'block';
    
    // Deshabilitar el scroll del body
    document.body.style.overflow = 'hidden';
}

function cerrarModal() {
    const modal = document.getElementById('modal-imagen');
    
    // Ocultar el modal
    modal.style.display = 'none';
    
    // Habilitar el scroll del body
    document.body.style.overflow = 'auto';
}

// Cerrar el modal al hacer clic fuera de la imagen
window.addEventListener('click', function(event) {
    const modal = document.getElementById('modal-imagen');
    if (event.target == modal) {
        cerrarModal();
    }
});

// Cerrar el modal con la tecla ESC
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        cerrarModal();
    }
});