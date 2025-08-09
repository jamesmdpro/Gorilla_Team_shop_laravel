// Carrusel de productos
let currentSlide = 0;
let carouselInterval;
const slides = document.querySelectorAll('.carousel-slide');
const totalSlides = slides.length;
const slidesToShow = 3; // Número de slides visibles al mismo tiempo
const maxSlide = totalSlides - slidesToShow;

// Función para mover el carrusel
function moveCarousel(direction) {
    const track = document.querySelector('.carousel-track');
    
    if (!track || totalSlides === 0) return;
    
    // Detener el auto-scroll cuando el usuario interactúa
    clearInterval(carouselInterval);
    
    currentSlide += direction;
    
    // Controlar los límites
    if (currentSlide > maxSlide) {
        currentSlide = 0; // Volver al inicio
    } else if (currentSlide < 0) {
        currentSlide = maxSlide; // Ir al final
    }
    
    // Calcular el desplazamiento
    const slideWidth = 100 / slidesToShow; // Porcentaje por slide visible
    const translateX = -(currentSlide * slideWidth);
    
    track.style.transform = `translateX(${translateX}%)`;
    
    // Reiniciar el auto-scroll después de 3 segundos
    setTimeout(startAutoScroll, 3000);
}

// Función para auto-scroll
function autoScroll() {
    moveCarousel(1);
}

// Función para iniciar el auto-scroll
function startAutoScroll() {
    clearInterval(carouselInterval);
    carouselInterval = setInterval(autoScroll, 4000); // Cambiar cada 4 segundos
}

// Función para detener el auto-scroll
function stopAutoScroll() {
    clearInterval(carouselInterval);
}

// Inicializar el carrusel cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    const carouselContainer = document.querySelector('.carousel-container');
    
    if (carouselContainer && totalSlides > 0) {
        // Configurar el ancho de cada slide
        slides.forEach(slide => {
            slide.style.flex = `0 0 ${100 / slidesToShow}%`;
        });
        
        // Iniciar auto-scroll
        startAutoScroll();
        
        // Pausar auto-scroll cuando el mouse está sobre el carrusel
        carouselContainer.addEventListener('mouseenter', stopAutoScroll);
        carouselContainer.addEventListener('mouseleave', startAutoScroll);
        
        // Soporte para navegación con teclado
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                moveCarousel(-1);
            } else if (e.key === 'ArrowRight') {
                moveCarousel(1);
            }
        });
    }
});

// Función para responsive - ajustar slides visibles según el tamaño de pantalla
function updateCarouselResponsive() {
    const screenWidth = window.innerWidth;
    let newSlidesToShow = 3;
    
    if (screenWidth < 768) {
        newSlidesToShow = 1;
    } else if (screenWidth < 1024) {
        newSlidesToShow = 2;
    }
    
    // Actualizar slides visibles
    if (newSlidesToShow !== slidesToShow) {
        slides.forEach(slide => {
            slide.style.flex = `0 0 ${100 / newSlidesToShow}%`;
        });
        
        // Reiniciar posición si es necesario
        currentSlide = Math.min(currentSlide, totalSlides - newSlidesToShow);
        const track = document.querySelector('.carousel-track');
        const slideWidth = 100 / newSlidesToShow;
        const translateX = -(currentSlide * slideWidth);
        track.style.transform = `translateX(${translateX}%)`;
    }
}

// Escuchar cambios de tamaño de ventana
window.addEventListener('resize', updateCarouselResponsive);