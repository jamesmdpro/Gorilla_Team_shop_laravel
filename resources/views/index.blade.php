<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/LOGO_GORILLA_TEAM.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200;400;600;800&display=swap" rel="stylesheet">
    <!-- Incluir CSS desde la carpeta resources/css -->
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popup-styles.css') }}">
    <!-- Incluir Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <title>GORILLA TEAM</title>
</head>
<body>
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
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <!-- MENU -->
    <div class="contenedor-header">
        <header>
            <h1>GORILLA <span class="txtRojo">TEAM</span></h1>
            <nav id="nav">
                <a href="#inicio" onclick="seleccionar()">inicio</a>
                <a href="#nosotros" onclick="seleccionar()">Resistencia</a>
                <a href="#servicios" onclick="seleccionar()">Desafíos</a>
                <a href="#comodidades" onclick="seleccionar()">S.O.S.</a>
                <a href="#galeria" onclick="seleccionar()">Galería</a>
                <a href="#equipo" onclick="seleccionar()">Equipo</a>
                <a href="#contacto" onclick="seleccionar()">Contacto</a>
            </nav>
            <div class="redes">
                <a href="#" id="cart-icon"><i class="material-icons-sharp">shopping_cart</i><span id="cart-count">0</span></a>
                <a href="https://www.facebook.com/GorillaMasters"><i class="material-icons-sharp">facebook</i></a>


            </div>
            
            <!-- Shopping Cart Popup -->
            <div id="cart-popup" class="popup-overlay">
                <div class="popup-content">
                    <div class="popup-header">
                        <h3>Carrito de Compras</h3>
                        <span class="close-popup">&times;</span>
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
            <div id="product-details-popup" class="popup-overlay">
                <div class="popup-content">
                    <div class="popup-header">
                        <h3>Detalles del Producto</h3>
                        <span class="close-popup">&times;</span>
                    </div>
                    <div id="product-details-content" class="product-details-content">
                        <!-- Product details will be loaded here dynamically -->
                    </div>
                </div>
            </div>

            <!-- Checkout Form Popup -->
            <div id="checkout-popup" class="popup-overlay" style="margin-top: 100px;">
                <div class="popup-content">
                    <div class="popup-header">
                        <h3>Finalizar Compra</h3>
                        <span class="close-popup">&times;</span>
                    </div>
                    <div class="checkout-form">
                        <p class="shipping-notice">¡Envío nacional gratis! Pago contra entrega.</p>
                        <form id="checkout-form">
                            <div class="form-group">
                                <label for="checkout-name">Nombre completo</label>
                                <input type="text" id="checkout-name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="checkout-phone">Teléfono</label>
                                <input type="tel" id="checkout-phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="checkout-email">Correo electrónico</label>
                                <input type="email" id="checkout-email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="checkout-address">Dirección de envío</label>
                                <input type="text" id="checkout-address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="checkout-city">Ciudad</label>
                                <input type="text" id="checkout-city" name="city" required>
                            </div>
                            <button type="submit" class="btn-submit">Confirmar Pedido</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Icono del menu responsive -->
            <div id="icono-nav" class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>                
        </header>
    </div>

    <!-- SECCION INICIO -->
    <section id="inicio" class="inicio">
        <div class="contenido-seccion">
            <div class="info">
                <h2>LA CUENTA REGRESIVA HA <span class="txtRojo">COMENZADO</span></h2>
                <p>¿Estás preparado para descubrir el secreto que se oculta detrás?</p>
                
                <!-- Contador de tiempo hasta 30/03/2025 -->
                <div id="countdown" class="countdown">
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
                
                <!-- <a href="#nosotros" class="btn-mas">
                    <i class="material-icons-sharp"> rocket_launch </i>
                </a> -->
            </div>
            <div class="opciones">
                <div class="opcion">
                    ENTUSIASTAS
                </div>
                <div class="opcion">
                    CROSSFITTER
                </div>
                <div class="opcion">
                    MILITARY
                </div>
                <div class="opcion">
                    ATHLETES
                </div>
                <div class="opcion">
                    PROFESIONALES
                </div>
                <div class="opcion">
                    FIGHTERS
                </div>
            </div>
        </div>
    </section>

    <!-- SECCION NOSOTROS -->
    <section id="nosotros" class="nosotros">
        <div class="fila">
            <div class="col">
                <img src="img/resistencia_1.png" alt="">
            </div>
            <div class="col">
                <div class="contenedor-titulo">
                    <div class="numero">
                        01
                    </div>
                    <div class="info">
                        <span class="frase">POTENCIA TU EVOLUCIÓN</span>
                        <h2>LA RESISTENCIA COMIENZA AQUÍ</h2>
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
                <h2>ÚNETE <span class="txtRojo">ACEPTA</span> EL RETO!</h2>
            </div>
            <div class="col2">
                <button id="btn-inscripcion" onclick="abrirFormulario()">INSCRIBETE YA</button>
            </div>
        </div>
        
        <!-- Formulario Pop-up -->
        <div id="overlay-formulario" class="overlay-formulario">
            <div class="popup-formulario">
                <div class="popup-header">
                    <h3>ÚNETE AL <span class="txtwhithe">RETO GORILLA</span></h3>
                    <span class="cerrar-popup" onclick="cerrarFormulario()">&times;</span>
                </div>
                <div class="popup-contenido">
                    <form id="formulario-inscripcion" action="{{ route('submit-reto') }}" method="POST">
                        @csrf
                        <div class="form-grupo">
                            <label for="nombre">Nombre y Apellidos</label>
                            <input type="text" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-grupo">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" id="correo" name="correo" required>
                        </div>
                        <div class="form-grupo">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" required>
                        </div>
                        <div class="form-grupo">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" id="ciudad" name="ciudad" required>
                        </div>
                        <div class="form-grupo form-fila">
                            <div class="form-col">
                                <label for="altura">Altura (cm)</label>
                                <input type="number" id="altura" name="altura" min="100" max="250" required>
                            </div>
                            <div class="form-col">
                                <label for="peso">Peso (kg)</label>
                                <input type="number" id="peso" name="peso" min="30" max="200" required>
                            </div>
                        </div>
                        <div class="form-grupo">
                            <label for="objetivo">Objetivo Principal</label>
                            <select id="objetivo" name="objetivo" required>
                                <option value="">Selecciona tu objetivo</option>
                                <option value="bajar_peso">Bajar de peso</option>
                                <option value="aumentar_masa">Aumentar masa muscular</option>
                                {{-- <option value="definicion">Definición muscular</option>
                                <option value="fuerza">Aumentar fuerza</option>
                                <option value="resistencia">Mejorar resistencia</option>
                                <option value="flexibilidad">Mejorar flexibilidad</option>
                                <option value="salud">Mejorar salud general</option>
                                <option value="rendimiento">Mejorar rendimiento deportivo</option>
                                <option value="recuperacion">Recuperación de lesión</option>
                                <option value="habitos">Crear hábitos saludables</option> --}}
                            </select>
                        </div>
                        <div class="form-grupo checkbox-grupo">
                            <input type="checkbox" id="terminos" name="terminos" required>
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
    </section>
    <hr>
    <!-- SECCION SERVICIOS -->
    <section class="servicios" id="servicios">
        <div class="contenido-seccion">
            <div class="fila">
                <div class="col">
                    <div class="contenedor-titulo">
                        <div class="numero">
                            02
                        </div>
                        <div class="info">
                            <span class="frase">SUPERA, INSPIRA, LIDERA</span>
                            <h2>DESAFIOS</h2>
                        </div>
                    </div>
                    <p class="p-especial">Acepta el reto, despierta tu máximo potencial</p>
                    <p>El verdadero cambio comienza con una decisión. Únete a <span class="txtRojo">TEAM GORILLA</span> y da el primer paso hacia una nueva versión de ti. Nuestra misión es desafiarte a evolucionar con los productos diseñados para potenciar tu fuerza, resistencia y mentalidad. No es solo un desafío, es un compromiso contigo mismo. Atrévete a cambiar, a entrenar con propósito y a formar parte de una comunidad que transforma hábitos en poder. ¡La resistencia empieza contigo!</p>
                </div>
                <div class="col">
                    <img src="img/servicios.png" alt="">
                </div>
            </div>
        </div>
        <div class="info-servicios">
            <table>
                <tr>
                    <td>
                        <i class="material-icons-sharp">rocket_launch</i>
                        <h3><span class="txtRojo">Innovación </span> y rendimiento</h3>
                        <p>Descubre la nueva generación de productos de <span class="txtRojo">TEAM GORILLA</span>, diseñados para potenciar tu fuerza, resistencia y recuperación.</p>
                    </td>
                    <td>
                        <i class="material-icons-sharp">psychology</i>
                        <h3><span class="txtRojo">Mentalidad </span> de acero</h3>
                        <p>La resistencia comienza en la mente. Aprende hábitos, estrategias y entrenamientos que te llevarán al siguiente nivel.</p>
                    </td>
                    <td>
                        <i class="material-icons-sharp">history_edu</i>
                        <h3><span class="txtRojo">Historia </span> en construcción</h3>
                        <p>La batalla por la evolución ha comenzado. Mientras la carrera se acerca, prepárate con las herramientas adecuadas.</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="material-icons-sharp">trending_up</i>
                        <h3><span class="txtRojo">Supera </span> tus límites</h3>
                        <p>Con cada entrenamiento y cada elección, te acercas a la mejor versión de ti. Únete a la resistencia con <span class="txtRojo">TEAM GORILLA</span>.</p>
                    </td>
                    <td>
                        <i class="material-icons-sharp">diversity_3</i>
                        <h3><span class="txtRojo">Comunidad </span> imparable</h3>
                        <p>No estás solo en este viaje. Conéctate con otros que comparten tu visión y crecen contigo.</p>
                    </td>
                    <td>
                        <i class="material-icons-sharp">auto_awesome</i>
                        <h3><span class="txtRojo">Transformación </span> real</h3>
                        <p>Esto no es solo un desafío, es un cambio de vida. La resistencia no usa armas, usa disciplina, constancia y los mejores productos.</p>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <!-- SECCION COMODIDADES -->
    <section id="comodidades" class="comodidades">
        <div class="fila">
            <div class="col">
                <img src="img/s.o.s.jpg" alt="">
            </div>
            <div class="col">
                <div class="contenedor-titulo">
                    <div class="numero">
                        03
                    </div>
                    <div class="info">
                        <span class="frase">CONQUISTA TU DESTINO</span>
                        <h2>S.O.S.</h2>
                    </div>
                </div>
                <p class="p-especial">¡Emergencia inminente! Fuerzas invisibles trabajan para mantenerte débil. Es momento de despertar.</p>
                <ul>
                    <li><span>ALERTA</span> - Un mensaje oculto ha sido interceptado. Algo o alguien no quiere que descubras tu verdadero potencial. Prepárate para romper las cadenas.</li>
                    <li><span>LA OPORTUNIDAD</span> - de cambiar tu destino está más cerca de lo que crees. Cada elección cuenta, cada esfuerzo te acerca a la verdadera resistencia.</li>
                    <li><span>¿Estás listo para aceptar el desafío?</span> - No permitas que controlen tu destino. La hora de actuar es ahora.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- SECCION GALERIA -->
    <section class="galeria" id="galeria">
        <div class="contenido-seccion">
            <div class="contenedor-titulo">
                <div class="numero">
                    04
                </div>
                <div class="info">
                    <span class="frase">LA MEJOR EXPERIENCIA</span>
                    <h2>GALERIA</h2>
                </div>
            </div>
            <!-- Carrusel de productos -->
            <div class="carousel-container">
                <div class="carousel-track">
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto1.jpg" alt="Producto 1" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto2.jpg" alt="Producto 2" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto3.jpg" alt="Producto 3" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto4.jpg" alt="Producto 4" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto5.jpg" alt="Producto 5" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto6.jpg" alt="Producto 6" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto7.jpg" alt="Producto 7" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto8.jpg" alt="Producto 8" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto9.jpg" alt="Producto 9" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto10.jpg" alt="Producto 10" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto11.jpg" alt="Producto 11" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto12.jpg" alt="Producto 12" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto13.jpg" alt="Producto 13" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <!-- Duplicar las primeras 3 imágenes para el efecto infinito -->
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto1.jpg" alt="Producto 1" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto2.jpg" alt="Producto 2" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                    <div class="carousel-slide">
                        <a href="/reto-30dias.html#productos" class="carousel-link">
                            <img src="img/Productos/producto3.jpg" alt="Producto 3" onclick="ampliarImagen(this)">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Modal para ampliar imágenes -->
    <div id="modal-imagen" class="modal-imagen">
        <span class="cerrar-modal" onclick="cerrarModal()">&times;</span>
        <img id="imagen-ampliada" class="imagen-ampliada">
    </div>
    
    <!-- SECCION EQUIPO -->
    <section class="equipo" id="equipo">
        <div class="contenido-seccion">
            <div class="contenedor-titulo">
                <div class="numero">
                    05
                </div>
                <div class="info">
                    <span class="frase">CONVIÉRTETE EN LEYENDA</span>
                    <h2>VANGUARDIA</h2>
                </div>
            </div>
            <div class="fila">
                <div class="col">
                    <img src="img/e1.png" alt="">
                    <div class="info">
                        <h2>MARCOS</h2>
                        <p>Fitness - Pilates - Yoga</p>
                        <a href="#">
                            <i class="material-icons-sharp">favorite</i> 
                        </a>
                        <a href="#">
                            <i class="material-icons-sharp"> fitness_center </i>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <img src="img/e2.png" alt="">
                    <div class="info">
                        <h2>PATRICIA</h2>
                        <p>Fitness - Pilates - Yoga</p>
                        <a href="#">
                            <i class="material-icons-sharp">favorite</i> 
                        </a>
                        <a href="#">
                            <i class="material-icons-sharp"> fitness_center </i>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <img src="img/e3.png" alt="">
                    <div class="info">
                        <h2>JUAN</h2>
                        <p>Fitness - Pilates - Yoga</p>
                        <a href="#">
                            <i class="material-icons-sharp">favorite</i> 
                        </a>
                        <a href="#">
                            <i class="material-icons-sharp"> pool </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCION CONTACTO -->
    <section class="contacto" id="contacto">
        <div class="contenido-seccion">
            <div class="contenedor-titulo">
                <div class="numero">
                    06
                </div>
                <div class="info">
                    <span class="frase">Atrévete a desafiar, conquista tu meta</span>
                    <h2>CONTACTO</h2>
                </div>
            </div>
            <form action="{{ route('leads.store') }}" method="POST" id="contact-form">
                @csrf
                <input type="hidden" name="source" value="contact_form">
                <div class="fila">
                    <div class="col">
                        <input type="email" name="email" placeholder="Ingrese Email" required>
                    </div>
                    <div class="col">
                        <input type="text" name="name" placeholder="Ingrese Nombre" required>
                    </div>
                </div>
                <div class="fila">
                    <div class="col">
                        <input type="tel" name="phone" placeholder="Ingrese Teléfono (opcional)">
                    </div>
                </div>
                <div class="mensaje">
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Ingresa el Mensaje"></textarea>
                    <button type="submit">Enviar Mensaje</button>
                </div>
            </form>
            <div class="fila-datos">
                <div class="col">
                    <i class="material-icons-sharp"> location_on </i>
                    ARMENIA QUINDIO - COLOMBIA
                </div>
                <div class="col">
                    <i class="material-icons-sharp"> phone </i>
                    304 - 589 5681
                </div>
                <div class="col">
                    <i class="material-icons-sharp"> schedule </i>
                    Lunes a Sábado, 8:00h - 24:00h
                </div>
            </div>
        </div>

    </section>

    <footer>
        <div class="info">
            <p>2023 - <span class="txtRojo">ONE DMENTE</span> Todos los derechos reservados</p>
            <div class="redes">
                <a href="https://www.facebook.com/GorillaMasters"><i class="material-icons-sharp">facebook</i></a>
                
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/reto.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/debug-cart.js') }}"></script>
    <script>
        function closeModal() {
            document.getElementById('errorModal').style.display = 'none';
        }
    </script>
    <script>
        // Define the route for the reto page
        window.retoRoute = "{{ route('reto-30dias') }}";
    </script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.querySelector('.carousel-track');
            const slides = document.querySelectorAll('.carousel-slide');
            let currentIndex = 0;
            const slideWidth = 100 / 3; // Porque mostramos 3 slides a la vez

            function nextSlide() {
                currentIndex++;
                if (currentIndex >= slides.length - 3) {
                    // Cuando llegamos al final, volvemos al principio suavemente
                    setTimeout(() => {
                        track.style.transition = 'none';
                        currentIndex = 0;
                        updateSlidePosition();
                        setTimeout(() => {
                            track.style.transition = 'transform 0.5s ease-in-out';
                        }, 50);
                    }, 500);
                }
                updateSlidePosition();
            }

            function updateSlidePosition() {
                track.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
            }

            // Auto slide cada 3 segundos
            setInterval(nextSlide, 3000);

            // Manejar clicks en las imágenes
            slides.forEach(slide => {
                slide.querySelector('img').addEventListener('click', function(e) {
                    e.preventDefault(); // Prevenir el comportamiento por defecto
                    ampliarImagen(this); // Mantener la funcionalidad de ampliar
                    setTimeout(() => {
                        window.location.href = '{{ route("reto-30dias") }}#productos';
                    }, 500); // Redirigir después de medio segundo
                });
            });
        });

        // Funciones para el formulario de inscripción
        function abrirFormulario() {
            document.getElementById('overlay-formulario').style.display = 'flex';
        }

        function cerrarFormulario() {
            document.getElementById('overlay-formulario').style.display = 'none';
        }

        // Aseguramos que el formulario se envíe correctamente
        document.addEventListener('DOMContentLoaded', function() {
            const formulario = document.getElementById('formulario-inscripcion');
            if (formulario) {
                // Guardamos los datos en localStorage antes de enviar el formulario
                formulario.addEventListener('submit', function() {
                    const formData = new FormData(formulario);
                    const userData = {};
                    
                    for (let [key, value] of formData.entries()) {
                        userData[key] = value;
                    }
                    
                    localStorage.setItem('userData', JSON.stringify(userData));
                    // El formulario se enviará normalmente a la ruta definida en el atributo action
                });
            }

            // Manejar formulario de contacto con AJAX
            const contactForm = document.getElementById('contact-form');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(contactForm);
                    const submitButton = contactForm.querySelector('button[type="submit"]');
                    const originalText = submitButton.textContent;
                    
                    // Cambiar texto del botón mientras se envía
                    submitButton.textContent = 'Enviando...';
                    submitButton.disabled = true;
                    
                    fetch('{{ route("leads.store") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || document.querySelector('input[name="_token"]').value
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Mostrar mensaje de éxito
                            alert(data.message);
                            contactForm.reset();
                        } else {
                            alert('Error al enviar el mensaje. Inténtalo de nuevo.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error al enviar el mensaje. Inténtalo de nuevo.');
                    })
                    .finally(() => {
                        // Restaurar botón
                        submitButton.textContent = originalText;
                        submitButton.disabled = false;
                    });
                });
            }
        });
    </script>
</body>
</html>
