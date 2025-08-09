@extends('layouts.app')

@section('title', 'GORILLA TEAM - Suplementos Deportivos | Conquista Tu Destino S.O.S.')
@section('description', 'Emergencia inminente: Fuerzas invisibles trabajan para mantenerte débil. Descubre los suplementos deportivos GORILLA TEAM y rompe las cadenas. ¡La resistencia comienza ahora!')
@section('keywords', 'suplementos deportivos, proteína whey, creatina, pre-entreno, BCAA, fitness, musculación, resistencia, gorilla team, suplementos colombia, conquista tu destino')

@push('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "GORILLA TEAM",
    "url": "{{ url('/') }}",
    "description": "Tienda especializada en suplementos deportivos de alta calidad",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ url('/') }}?search={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Store",
    "name": "GORILLA TEAM",
    "description": "Tienda especializada en suplementos deportivos para atletas y entusiastas del fitness",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('img/LOGO_GORILLA_TEAM.png') }}",
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "CO"
    },
    "openingHours": "Mo-Su 00:00-23:59",
    "paymentAccepted": "Cash, Credit Card",
    "priceRange": "$$"
}
</script>
@endpush

@section('content')
    <div class="container_error">
        @if ($errors->any())
            <div class="modal fade show" id="errorModal" tabindex="-1" role="dialog" style="display: block; background-color: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content error-modal">
                        <div class="modal-header">
                            <h5 class="modal-title text-white">Error</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-white">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    
    <!-- MENU -->
    <div class="contenedor-header">
        <header>
            <h1>GORILLA <span class="txtRojo">TEAM</span></h1>
            <nav id="nav" role="navigation" aria-label="Navegación principal">
                <a href="#inicio" onclick="seleccionar()" aria-label="Ir a inicio">inicio</a>
                <a href="#nosotros" onclick="seleccionar()" aria-label="Conoce nuestra resistencia">Resistencia</a>
                <a href="#servicios" onclick="seleccionar()" aria-label="Ver nuestros desafíos">Desafíos</a>
                <a href="#comodidades" onclick="seleccionar()" aria-label="Mensaje S.O.S.">S.O.S.</a>
                <a href="#galeria" onclick="seleccionar()" aria-label="Ver galería">Galería</a>
                <a href="#equipo" onclick="seleccionar()" aria-label="Conoce nuestro equipo">Equipo</a>
                <a href="#contacto" onclick="seleccionar()" aria-label="Contactar con nosotros">Contacto</a>
            </nav>
            <div class="redes">
                <a href="#" id="cart-icon" aria-label="Ver carrito de compras"><i class="material-icons-sharp">shopping_cart</i><span id="cart-count">0</span></a>
                <a href="https://www.facebook.com/GorillaMasters" aria-label="Síguenos en Facebook" target="_blank" rel="noopener"><i class="material-icons-sharp">facebook</i></a>
            </div>
            
            <!-- Shopping Cart Popup -->
            <div id="cart-popup" class="popup-overlay" role="dialog" aria-modal="true" aria-labelledby="cart-popup-title">
                <div class="popup-content">
                    <div class="popup-header">
                        <h3 id="cart-popup-title">Carrito de Compras</h3>
                        <span class="close-popup" aria-label="Cerrar carrito">&times;</span>
                    </div>
                    <div id="cart-items" class="cart-items">
                        <!-- Cart items will be added here dynamically -->
                    </div>
                    <div class="cart-total">
                        <span>Total:</span>
                        <span id="cart-total-amount">$0</span>
                    </div>
                    <button id="checkout-btn" class="btn-checkout">Proceder al Pago</button>
                </div>
            </div>

            <!-- Product Details Popup -->
            <div id="product-details-popup" class="popup-overlay" role="dialog" aria-modal="true" aria-labelledby="product-details-title">
                <div class="popup-content">
                    <div class="popup-header">
                        <h3 id="product-details-title">Detalles del Producto</h3>
                        <span class="close-popup" aria-label="Cerrar detalles del producto">&times;</span>
                    </div>
                    <div id="product-details-content" class="product-details-content">
                        <!-- Product details will be loaded here dynamically -->
                    </div>
                </div>
            </div>

            <!-- Checkout Form Popup -->
            <div id="checkout-popup" class="popup-overlay" style="margin-top: 100px;" role="dialog" aria-modal="true" aria-labelledby="checkout-popup-title">
                <div class="popup-content">
                    <div class="popup-header">
                        <h3 id="checkout-popup-title">Finalizar Compra</h3>
                        <span class="close-popup" aria-label="Cerrar formulario de compra">&times;</span>
                    </div>
                    <div class="checkout-form">
                        <p class="shipping-notice">¡Envío nacional gratis! Pago contra entrega.</p>
                        <form id="checkout-form" aria-label="Formulario para finalizar compra">
                            <div class="form-group">
                                <label for="checkout-name">Nombre completo</label>
                                <input type="text" id="checkout-name" name="name" required aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="checkout-phone">Teléfono</label>
                                <input type="tel" id="checkout-phone" name="phone" required aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="checkout-email">Correo electrónico</label>
                                <input type="email" id="checkout-email" name="email" required aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="checkout-address">Dirección de envío</label>
                                <input type="text" id="checkout-address" name="address" required aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="checkout-city">Ciudad</label>
                                <input type="text" id="checkout-city" name="city" required aria-required="true">
                            </div>
                            <button type="submit" class="btn-submit">Confirmar Pedido</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Icono del menu responsive -->
            <button id="icono-nav" class="nav-responsive" onclick="mostrarOcultarMenu()" aria-label="Mostrar o ocultar menú">
                <i class="fa-solid fa-bars"></i>
            </button>                
        </header>
    </div>

    <!-- SECCION INICIO -->
    <section id="inicio" class="inicio" role="region" aria-labelledby="inicio-title">
        <div class="contenido-seccion">
            <div class="info">
                <h1 id="inicio-title">LA CUENTA REGRESIVA HA <span class="txtRojo">COMENZADO</span></h1>
                <p>¿Estás preparado para descubrir el secreto que se oculta detrás?</p>
                
                <!-- Contador de tiempo hasta 30/03/2025 -->
                <div id="countdown" class="countdown" role="timer" aria-live="polite" aria-atomic="true" aria-label="Contador regresivo hasta 30 de marzo de 2025">
                    <div class="time-container">
                        <div id="days" class="time">00</div>
                        <span>Días</span>
                    </div>
                    <div class="time-container">
                        <div id="hours" class="time">00</div>
                        <span>Horas</span>
                    </div>
                    <div class="time-container">
                        <div id="minutes" class="time">00</div>
                        <span>Minutos</span>
                    </div>
                    <div class="time-container">
                        <div id="seconds" class="time">00</div>
                        <span>Segundos</span>
                    </div>
                </div>
            </div>
            <div class="opciones" role="list" aria-label="Categorías de entusiastas">
                <div class="opcion" role="listitem">
                    ENTUSIASTAS
                </div>
                <div class="opcion" role="listitem">
                    CROSSFITTER
                </div>
                <div class="opcion" role="listitem">
                    MILITARY
                </div>
                <div class="opcion" role="listitem">
                    ATHLETES
                </div>
                <div class="opcion" role="listitem">
                    PROFESIONALES
                </div>
                <div class="opcion" role="listitem">
                    FIGHTERS
                </div>
            </div>
        </div>
    </section>

    <!-- SECCION NOSOTROS -->
    <section id="nosotros" class="nosotros" role="region" aria-labelledby="nosotros-title">
        <div class="contenido-seccion">
            <div class="fila">
                <div class="col">
                    <img src="img/resistencia_1.png" alt="Imagen representativa de la resistencia GORILLA TEAM">
                </div>
                <div class="col">
                    <div class="contenedor-titulo">
                        <div class="numero">
                            01
                        </div>
                        <div class="info">
                            <span class="frase">POTENCIA TU EVOLUCIÓN</span>
                            <h2 id="nosotros-title">LA RESISTENCIA COMIENZA AQUÍ</h2>
                        </div>
                    </div>
                    <p class="p-especial">¡Descubre las herramientas que transformarán tu cuerpo y mente con GORILLA <span class="txtRojo">TEAM</span>!</p>
                    <p>"La verdadera resistencia no se trata solo de luchar, sino de evolucionar. GORILLA <span class="txtRojo">TEAM</span> no es solo un desafío, es un movimiento. Nuestra línea de productos está diseñada para llevar tu rendimiento al siguiente nivel: suplementos, equipo deportivo y tecnología avanzada para optimizar tu fuerza y resistencia. Es hora de desbloquear tu máximo potencial y desafiar tus propios límites. Únete a la resistencia, equípate con lo mejor y transforma tu vida. ¡El cambio comienza hoy!"</p>
                </div>           
            </div>
            <hr>
            <div class="fila-nosotros">
                <div class="col1">
                    <span class="frase">
                        <span class="txtRojo">DESAFÍO</span> SUPREMO
                    </span>
                    <h3>ÚNETE <span class="txtRojo">ACEPTA</span> EL RETO!</h3>
                </div>
                <div class="col2">
                    <button id="btn-inscripcion" onclick="abrirFormulario()" aria-label="Inscribirse al reto GORILLA">INSCRIBETE YA</button>
                </div>
            </div>
            
            <!-- Formulario Pop-up -->
            <div id="overlay-formulario" class="overlay-formulario" role="dialog" aria-modal="true" aria-labelledby="formulario-title">
                <div class="popup-formulario">
                    <div class="popup-header">
                        <h3 id="formulario-title">ÚNETE AL <span class="txtwhithe">RETO GORILLA</span></h3>
                        <span class="cerrar-popup" onclick="cerrarFormulario()" aria-label="Cerrar formulario">&times;</span>
                    </div>
                    <div class="popup-contenido">
                        <form id="formulario-inscripcion" action="{{ route('submit-reto') }}" method="POST" aria-label="Formulario de inscripción al reto">
                            @csrf
                            <div class="form-grupo">
                                <label for="nombre">Nombre y Apellidos</label>
                                <input type="text" id="nombre" name="nombre" required aria-required="true">
                            </div>
                            <div class="form-grupo">
                                <label for="correo">Correo Electrónico</label>
                                <input type="email" id="correo" name="correo" required aria-required="true">
                            </div>
                            <div class="form-grupo">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" id="telefono" name="telefono" required aria-required="true">
                            </div>
                            <div class="form-grupo">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" id="ciudad" name="ciudad" required aria-required="true">
                            </div>
                            <div class="form-grupo form-fila">
                                <div class="form-col">
                                    <label for="altura">Altura (cm)</label>
                                    <input type="number" id="altura" name="altura" min="100" max="250" required aria-required="true">
                                </div>
                                <div class="form-col">
                                    <label for="peso">Peso (kg)</label>
                                    <input type="number" id="peso" name="peso" min="30" max="200" required aria-required="true">
                                </div>
                            </div>
                            <div class="form-grupo">
                                <label for="objetivo">Objetivo Principal</label>
                                <select id="objetivo" name="objetivo" required aria-required="true">
                                    <option value="">Selecciona tu objetivo</option>
                                    <option value="bajar_peso">Bajar de peso</option>
                                    <option value="aumentar_masa">Aumentar masa muscular</option>
                                </select>
                            </div>
                            <div class="form-grupo checkbox-grupo">
                                <input type="checkbox" id="terminos" name="terminos" required aria-required="true">
                                <label for="terminos">Acepto los términos y condiciones</label>
                            </div>
                            <div class="form-grupo checkbox-grupo">
                                <input type="checkbox" id="comunicaciones" name="comunicaciones" checked>
                                <label for="comunicaciones">Acepto recibir información vía correo, SMS o WhatsApp</label>
                            </div>
                            <button type="submit" class="btn-enviar">UNIRME AL RETO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    
    <!-- SECCION SERVICIOS -->
    <section class="servicios" id="servicios" role="region" aria-labelledby="servicios-title">
        <div class="contenido-seccion">
            <div class="fila">
                <div class="col">
                    <div class="contenedor-titulo">
                        <div class="numero">
                            02
                        </div>
                        <div class="info">
                            <span class="frase">SUPERA, INSPIRA, LIDERA</span>
                            <h2 id="servicios-title">DESAFIOS</h2>
                        </div>
                    </div>
                    <p class="p-especial">Acepta el reto, despierta tu máximo potencial</p>
                    <p>El verdadero cambio comienza con una decisión. Únete a <span class="txtRojo">TEAM GORILLA</span> y da el primer paso hacia una nueva versión de ti. Nuestra misión es desafiarte a evolucionar con los productos diseñados para potenciar tu fuerza, resistencia y mentalidad. No es solo un desafío, es un compromiso contigo mismo. Atrévete a cambiar, a entrenar con propósito y a formar parte de una comunidad que transforma hábitos en poder. ¡La resistencia empieza contigo!</p>
                </div>
                <div class="col">
                    <img src="img/servicios.png" alt="Servicios y desafíos GORILLA TEAM">
                </div>
            </div>
        </div>
        <div class="info-servicios">
            <table role="table" aria-label="Servicios y características de GORILLA TEAM">
                <tr>
                    <td>
                        <i class="material-icons-sharp" aria-hidden="true">rocket_launch</i>
                        <h3><span class="txtRojo">Innovación </span> y rendimiento</h3>
                        <p>Descubre la nueva generación de productos de <span class="txtRojo">TEAM GORILLA</span>, diseñados para potenciar tu fuerza, resistencia y recuperación.</p>
                    </td>
                    <td>
                        <i class="material-icons-sharp" aria-hidden="true">psychology</i>
                        <h3><span class="txtRojo">Mentalidad </span> de acero</h3>
                        <p>La resistencia comienza en la mente. Aprende hábitos, estrategias y entrenamientos que te llevarán al siguiente nivel.</p>
                    </td>
                    <td>
                        <i class="material-icons-sharp" aria-hidden="true">history_edu</i>
                        <h3><span class="txtRojo">Historia </span> en construcción</h3>
                        <p>La batalla por la evolución ha comenzado. Mientras la carrera se acerca, prepárate con las herramientas adecuadas.</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="material-icons-sharp" aria-hidden="true">trending_up</i>
                        <h3><span class="txtRojo">Supera </span> tus límites</h3>
                        <p>Con cada entrenamiento y cada elección, te acercas a la mejor versión de ti. Únete a la resistencia con <span class="txtRojo">TEAM GORILLA</span>.</p>
                    </td>
                    <td>
                        <i class="material-icons-sharp" aria-hidden="true">diversity_3</i>
                        <h3><span class="txtRojo">Comunidad </span> imparable</h3>
                        <p>No estás solo en este viaje. Conéctate con otros que comparten tu visión y crecen contigo.</p>
                    </td>
                    <td>
                        <i class="material-icons-sharp" aria-hidden="true">auto_awesome</i>
                        <h3><span class="txtRojo">Transformación </span> real</h3>
                        <p>Esto no es solo un desafío, es un cambio de vida. La resistencia no usa armas, usa disciplina, constancia y los mejores productos.</p>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <!-- SECCION COMODIDADES (S.O.S.) -->
    <section id="comodidades" class="comodidades" role="region" aria-labelledby="sos-title">
        <div class="fila">
            <div class="col">
                <img src="img/s.o.s.jpg" alt="Mensaje S.O.S. - Conquista tu destino">
            </div>
            <div class="col">
                <div class="contenedor-titulo">
                    <div class="numero">
                        03
                    </div>
                    <div class="info">
                        <span class="frase">CONQUISTA TU DESTINO</span>
                        <h2 id="sos-title">S.O.S.</h2>
                    </div>
                </div>
                <p class="p-especial">¡Emergencia inminente! Fuerzas invisibles trabajan para mantenerte débil. Es momento de despertar.</p>
                <ul role="list">
                    <li role="listitem"><span>ALERTA</span> - Un mensaje oculto ha sido interceptado. Algo o alguien no quiere que descubras tu verdadero potencial. Prepárate para romper las cadenas.</li>
                    <li role="listitem"><span>LA OPORTUNIDAD</span> - de cambiar tu destino está más cerca de lo que crees. Cada elección cuenta, cada esfuerzo te acerca a la verdadera resistencia.</li>
                    <li role="listitem"><span>¿Estás listo para aceptar el desafío?</span> - No permitas que controlen tu destino. La hora de actuar es ahora.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- SECCION GALERIA -->
    <section class="galeria" id="galeria" role="region" aria-labelledby="galeria-title">
        <div class="contenido-seccion">
            <div class="contenedor-titulo">
                <div class="numero">
                    04
                </div>
                <div class="info">
                    <span class="frase">LA MEJOR EXPERIENCIA</span>
                    <h2 id="galeria-title">GALERIA</h2>
                </div>
            </div>
            <!-- Carrusel de productos -->
            <div class="carousel-container" role="region" aria-label="Carrusel de productos">
                <div class="carousel-track">
                    <div class="carousel-slide">
                        <a href="{{ route('reto-30dias') }}#productos" class="carousel-link" aria-label="Ver producto 1">
                            <img src="img/Productos/producto1.jpg" alt="Suplemento deportivo GORILLA TEAM - Producto 1" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="{{ route('reto-30dias') }}#productos" class="carousel-link" aria-label="Ver producto 2">
                            <img src="img/Productos/producto2.jpg" alt="Suplemento deportivo GORILLA TEAM - Producto 2" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="{{ route('reto-30dias') }}#productos" class="carousel-link" aria-label="Ver producto 3">
                            <img src="img/Productos/producto3.jpg" alt="Suplemento deportivo GORILLA TEAM - Producto 3" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="{{ route('reto-30dias') }}#productos" class="carousel-link" aria-label="Ver producto 4">
                            <img src="img/Productos/producto4.jpg" alt="Suplemento deportivo GORILLA TEAM - Producto 4" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="{{ route('reto-30dias') }}#productos" class="carousel-link" aria-label="Ver producto 5">
                            <img src="img/Productos/producto5.jpg" alt="Suplemento deportivo GORILLA TEAM - Producto 5" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="{{ route('reto-30dias') }}#productos" class="carousel-link" aria-label="Ver producto 6">
                            <img src="img/Productos/producto6.jpg" alt="Suplemento deportivo GORILLA TEAM - Producto 6" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="{{ route('reto-30dias') }}#productos" class="carousel-link" aria-label="Ver producto 7">
                            <img src="img/Productos/producto7.jpg" alt="Suplemento deportivo GORILLA TEAM - Producto 7" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="{{ route('reto-30dias') }}#productos" class="carousel-link" aria-label="Ver producto 8">
                            <img src="img/Productos/producto8.jpg" alt="Suplemento deportivo GORILLA TEAM - Producto 8" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                </div>
                <button class="carousel-btn prev" onclick="moveCarousel(-1)" aria-label="Producto anterior">&#10094;</button>
                <button class="carousel-btn next" onclick="moveCarousel(1)" aria-label="Siguiente producto">&#10095;</button>
            </div>
        </div>
    </section>

    <!-- SECCION EQUIPO -->
    <section class="equipo" id="equipo" role="region" aria-labelledby="equipo-title">
        <div class="contenedor-titulo">
            <div class="numero">
                05
            </div>
            <div class="info">
                <span class="frase">CONOCE A LOS LÍDERES</span>
                <h2 id="equipo-title">EQUIPO</h2>
            </div>
        </div>
        <div class="fila">
            <div class="col">
                <img src="img/equipo1.jpg" alt="Miembro del equipo GORILLA TEAM">
                <div class="info">
                    <h3>Líder de Resistencia</h3>
                    <p>Especialista en transformación física y mental</p>
                    <a href="#" aria-label="Perfil en Facebook"><i class="material-icons-sharp">facebook</i></a>
                    <a href="#" aria-label="Perfil en Instagram"><i class="material-icons-sharp">camera_alt</i></a>
                </div>
            </div>
            <div class="col">
                <img src="img/equipo2.jpg" alt="Miembro del equipo GORILLA TEAM">
                <div class="info">
                    <h3>Estratega Nutricional</h3>
                    <p>Experto en suplementación deportiva</p>
                    <a href="#" aria-label="Perfil en Facebook"><i class="material-icons-sharp">facebook</i></a>
                    <a href="#" aria-label="Perfil en Instagram"><i class="material-icons-sharp">camera_alt</i></a>
                </div>
            </div>
            <div class="col">
                <img src="img/equipo3.jpg" alt="Miembro del equipo GORILLA TEAM">
                <div class="info">
                    <h3>Comandante de Entrenamiento</h3>
                    <p>Especialista en rendimiento atlético</p>
                    <a href="#" aria-label="Perfil en Facebook"><i class="material-icons-sharp">facebook</i></a>
                    <a href="#" aria-label="Perfil en Instagram"><i class="material-icons-sharp">camera_alt</i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCION CONTACTO -->
    <section class="contacto" id="contacto" role="region" aria-labelledby="contacto-title">
        <div class="contenido-seccion">
            <div class="contenedor-titulo">
                <div class="numero">
                    06
                </div>
                <div class="info">
                    <span class="frase">ÚNETE A LA RESISTENCIA</span>
                    <h2 id="contacto-title">CONTACTO</h2>
                </div>
            </div>
            <form action="#" method="POST" aria-label="Formulario de contacto">
                @csrf
                <div class="fila">
                    <div class="col">
                        <input type="text" name="nombre" placeholder="Nombre completo" required aria-required="true" aria-label="Nombre completo">
                    </div>
                    <div class="col">
                        <input type="email" name="email" placeholder="Correo electrónico" required aria-required="true" aria-label="Correo electrónico">
                    </div>
                </div>
                <textarea name="mensaje" placeholder="Tu mensaje" required aria-required="true" aria-label="Mensaje"></textarea>
                <button type="submit">ENVIAR MENSAJE</button>
            </form>
            <div class="fila-datos">
                <div class="col">
                    <i class="material-icons-sharp" aria-hidden="true">location_on</i>
                    <span>Colombia</span>
                </div>
                <div class="col">
                    <i class="material-icons-sharp" aria-hidden="true">phone</i>
                    <span>+57 300 123 4567</span>
                </div>
                <div class="col">
                    <i class="material-icons-sharp" aria-hidden="true">email</i>
                    <span>info@gorillateam.com</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer role="contentinfo">
        <div class="footer-content">
            <p>&copy; 2025 GORILLA TEAM. Todos los derechos reservados. | <a href="#" aria-label="Política de privacidad">Política de Privacidad</a> | <a href="#" aria-label="Términos y condiciones">Términos y Condiciones</a></p>
        </div>
    </footer>

@endsection

@push('scripts')
    <!-- Scripts específicos de la página -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
@endpush