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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reto.css') }}">
    <title>RETO 30 DÍAS - GORILLA TEAM</title>
</head>
<body>
    <!-- MENU -->
    <div class="contenedor-header">
        <header>
            <h1>GORILLA <span class="txtRojo">TEAM</span></h1>
            <nav id="nav">
                <a href="{{ route('home') }}">Inicio</a>
                <a href="#programa">Programa</a>
                <a href="#productos">Productos</a>
                <a href="#rutinas">Rutinas</a>
                <a href="#nutricion">Nutrición</a>
                <a href="#testimonios">Testimonios</a>
            </nav>
            <div class="redes">
                <a href="#" id="cart-icon"><i class="material-icons-sharp">shopping_cart</i><span id="cart-count">0</span></a>
                <a href="https://www.facebook.com/GorillaMasters"><i class="material-icons-sharp">facebook</i></a>
                
            </div>
            <!-- Icono del menu responsive -->
            <div id="icono-nav" class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>                
        </header>
    </div>

    <!-- BANNER PRINCIPAL -->
    <section class="banner-reto">
        <div class="contenido-banner">
            <h1>RETO <span class="txtRojo">30 DÍAS</span></h1>
            <p>¡FELICIDADES! Te has unido al desafío que transformará tu cuerpo y mente</p>
            <div class="objetivo-seleccionado">
                <h3>TU OBJETIVO: <span id="objetivo-usuario" class="txtRojo">{{ session('objetivo') ? strtoupper(str_replace('_', ' ', session('objetivo'))) : 'TRANSFORMACIÓN TOTAL' }}</span></h3>
            </div>
        </div>
    </section>

    <!-- SECCIÓN PROGRAMA -->
    <section id="programa" class="programa-seccion">
        <div class="contenedor">
            <div class="titulo-seccion">
                <div class="numero">01</div>
                <h2>EL <span class="txtRojo">PROGRAMA</span></h2>
            </div>
            <div class="descripcion-programa">
                <p>Durante los próximos 30 días, seguirás un programa estructurado diseñado específicamente para alcanzar tus objetivos. Este reto está respaldado por la ciencia y potenciado por los productos GORILLA TEAM, formulados para maximizar tus resultados.</p>
            </div>
            
            <div class="tabs-container">
                <div class="tabs">
                    <button class="tab-btn active" onclick="cambiarTab('bajar')">BAJAR DE PESO</button>
                    <button class="tab-btn" onclick="cambiarTab('aumentar')">AUMENTAR MASA MUSCULAR</button>
                </div>
                
                <div id="bajar" class="tab-content active">
                    <div class="programa-info">
                        <div class="programa-img">
                            <img src="img/Reto/reto.jpg" alt="Programa para bajar de peso">
                        </div>
                        <div class="programa-texto">
                            <h3>PROGRAMA DE <span class="txtRojo">PÉRDIDA DE PESO</span></h3>
                            <p>Este programa está diseñado para ayudarte a perder grasa corporal de manera efectiva y saludable, manteniendo tu masa muscular. Combina entrenamiento de alta intensidad con nutrición estratégica y suplementación específica.</p>
                            <ul class="beneficios-lista">
                                <li><i class="material-icons-sharp">check_circle</i> Pérdida de grasa acelerada</li>
                                <li><i class="material-icons-sharp">check_circle</i> Preservación de masa muscular</li>
                                <li><i class="material-icons-sharp">check_circle</i> Aumento de energía</li>
                                <li><i class="material-icons-sharp">check_circle</i> Mejora del metabolismo</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div id="aumentar" class="tab-content">
                    <div class="programa-info">
                        <div class="programa-img">
                            <img src="img/Reto/reto1.jpg" alt="Programa para aumentar masa muscular">
                        </div>
                        <div class="programa-texto">
                            <h3>PROGRAMA DE <span class="txtRojo">GANANCIA MUSCULAR</span></h3>
                            <p>Este programa está diseñado para maximizar el crecimiento muscular a través de entrenamiento progresivo, nutrición optimizada para el anabolismo y suplementación estratégica para potenciar la recuperación y el crecimiento.</p>
                            <ul class="beneficios-lista">
                                <li><i class="material-icons-sharp">check_circle</i> Aumento de masa muscular magra</li>
                                <li><i class="material-icons-sharp">check_circle</i> Incremento de fuerza</li>
                                <li><i class="material-icons-sharp">check_circle</i> Mejora de la composición corporal</li>
                                <li><i class="material-icons-sharp">check_circle</i> Recuperación optimizada</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN PRODUCTOS -->
    <section id="productos" class="productos-seccion">
        <div class="contenedor">
            <div class="titulo-seccion">
                <div class="numero">02</div>
                <h2>PRODUCTOS <span class="txtRojo">ESENCIALES</span></h2>
            </div>
            <p class="descripcion-productos">Para maximizar tus resultados durante el reto de 30 días, es fundamental utilizar los productos de la línea GORILLA TEAM, especialmente formulados para potenciar tu rendimiento y acelerar tus resultados.</p>
            
            <div class="productos-grid">
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0004.jpg" alt="Proteína GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>PROTEÍNA MASS <span class="txtRojo">GORILLA</span></h3>
                        <p>Nuestra proteína premium de absorción rápida y lenta, ideal para recuperación y crecimiento muscular.</p>
                        <div class="galeria-producto">
                            <!-- <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0004.jpg" alt="Proteína GORILLA - Vista 1" onclick="ampliarImagen(this)"> -->
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0005.jpg" alt="Proteína GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0008.jpg" alt="Proteína GORILLA - Vista 3" onclick="ampliarImagen(this)">
                        </div>
                        <button class="btn-producto" onclick="verProducto('proteina')">VER DETALLES</button>
                    </div>
                </div>
                
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0007.jpg" alt="Pre-entreno GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>CREATINA <span class="txtRojo">GORILLA</span></h3>
                        <p>Creatina monohidrato pura para aumentar la fuerza, potencia muscular y mejorar la recuperación entre series durante tus entrenamientos intensos.</p>
                        <div class="galeria-producto">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0007.jpg" alt="Pre-entreno GORILLA - Vista 1" onclick="ampliarImagen(this)">
                            <!-- <img src="img/resistencia.png" alt="Pre-entreno GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <img src="img/resistencia.png" alt="Pre-entreno GORILLA - Vista 3" onclick="ampliarImagen(this)"> -->
                        </div>
                        <button class="btn-producto" onclick="verProducto('creatina')">VER DETALLES</button>
                    </div>
                </div>
                
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0029.jpg" alt="BCAA GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>BCAA <span class="txtRojo">GORILLA</span></h3>
                        <p>Aminoácidos de cadena ramificada de alta calidad para optimizar la recuperación muscular, reducir la fatiga y preservar la masa muscular durante entrenamientos intensos.</p>
                        <div class="galeria-producto">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0029.jpg" alt="BCAA GORILLA - Vista 1" onclick="ampliarImagen(this)">
                            <!-- <img src="img/resistencia.png" alt="Quemador GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <img src="img/resistencia.png" alt="Quemador GORILLA - Vista 3" onclick="ampliarImagen(this)"> -->
                        </div>
                        <button class="btn-producto" onclick="verProducto('BCAA')">VER DETALLES</button>
                    </div>
                </div>

                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0012.jpg" alt="RIPPED GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>RIPPED <span class="txtRojo">GORILLA</span></h3>
                        <p>Fórmula avanzada con 24g de proteína enriquecida con artichofas, cáscara de papa, resveratrol e inulina. Potenciada con cromo picolinato, colágeno hidrolizado, potasio y vitamina E para definición muscular, reducción de grasa y tonificación específica para el organismo femenino.</p>
                        <div class="galeria-producto">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0013.jpg" alt="RIPPED GORILLA - Vista 1" onclick="ampliarImagen(this)">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0014.jpg" alt="RIPPED GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <!-- <img src="img/resistencia.png" alt="RIPPED GORILLA - Vista 3" onclick="ampliarImagen(this)"> -->
                        </div>
                        <button class="btn-producto" onclick="verProducto('ripped')">VER DETALLES</button>
                    </div>
                </div>
                
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0016.jpg" alt="TEST BOOST GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>TEST BOOST <span class="txtRojo">GORILLA</span></h3>
                        <p>Potente fórmula natural con quinoa, ácido aspártico, chontaduro, maca, β-alanina, citrulina y L-arginina. Diseñado para optimizar los niveles de testosterona, aumentar la energía, mejorar el rendimiento físico y potenciar la masa muscular. La combinación perfecta para llevar tu virilidad y fuerza al siguiente nivel.</p>
                        <div class="galeria-producto">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0016.jpg" alt="TEST BOOST GORILLA - Vista 1" onclick="ampliarImagen(this)">
                            <!-- <img src="img/resistencia.png" alt="TEST BOOST GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <img src="img/resistencia.png" alt="TEST BOOST GORILLA - Vista 3" onclick="ampliarImagen(this)"> -->
                        </div>
                        <button class="btn-producto" onclick="verProducto('test_boost')">VER DETALLES</button>
                    </div>
                </div>
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0009.jpg" alt="RIPPED GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>RIPPED<span class="txtRojo">GORILLA</span></h3>
                        <p>Fórmula revolucionaria para transformar tu físico. Maximiza la construcción muscular, potencia la definición y eleva tu fuerza al extremo. Activa tu metabolismo, destroza la grasa y optimiza la recuperación. Diseñada para hombres que no aceptan límites y exigen resultados visibles.</p>
                        <div class="galeria-producto">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0010.jpg" alt="RIPPED GORILLA - Vista 1" onclick="ampliarImagen(this)">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0011.jpg" alt="RIPPED GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <!-- <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0009.jpg" alt="RIPPED GORILLA - Vista 3" onclick="ampliarImagen(this)"> -->
                        </div>
                        <button class="btn-producto" onclick="verProducto('ripped')">VER DETALLES</button>
                    </div>
                </div>
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0017.jpg" alt="ISO COMPLEX GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>ISO COMPLEX <span class="txtRojo">GORILLA</span></h3>
                        <p>Proteína de aislado premium diseñada para atletas inmersos en entrenamientos intensos. Con 27g de proteína por porción y un ratio de pureza del 90%, maximiza la síntesis proteica y acelera la recuperación muscular post-entrenamiento. Formulación avanzada que garantiza absorción inmediata y aprovechamiento total para quienes exigen lo mejor de su cuerpo.</p>
                        <div class="galeria-producto">
                            <!-- <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0017.jpg" alt="ISO COMPLEX GORILLA - Vista 1" onclick="ampliarImagen(this)"> -->
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0019.jpg" alt="ISO COMPLEX GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0020.jpg" alt="ISO COMPLEX GORILLA - Vista 3" onclick="ampliarImagen(this)">
                        </div>
                        <button class="btn-producto" onclick="verProducto('isocomplex')">VER DETALLES</button>
                    </div>
                </div>
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0020.jpg" alt="WHEY 100% GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>WHEY 100% <span class="txtRojo">GORILLA</span></h3>
                        <p>Proteína de suero pura diseñada para maximizar el desarrollo muscular con tecnología de filtración avanzada. Con 25g de proteína por porción de 30g y un ratio superior del 83%, proporciona absorción ultrarrápida y máxima biodisponibilidad. Ideal para potenciar la recuperación, impulsar el crecimiento muscular y optimizar el rendimiento físico. La elección definitiva para atletas que exigen calidad suprema en cada dosis.</p>
                        <div class="galeria-producto">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0021.jpg" alt="WHEY 100% GORILLA - Vista 1" onclick="ampliarImagen(this)">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0022.jpg" alt="WHEY 100% GORILLA - Vista 2" onclick="ampliarImagen(this)"> 
                            <!-- <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0022.jpg" alt="WHEY 100% GORILLA - Vista 3" onclick="ampliarImagen(this)"> -->
                        </div>
                        <button class="btn-producto" onclick="verProducto('whey')">VER DETALLES</button>
                    </div>
                </div>
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0023.jpg" alt="ZERO CARBS GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>ZERO CARBS <span class="txtRojo">GORILLA</span></h3>
                        <p>Proteína de suero pura diseñada para maximizar el desarrollo muscular con tecnología de filtración avanzada. Con 25g de proteína por porción de 30g y un ratio superior del 83%, proporciona absorción ultrarrápida y máxima biodisponibilidad. Ideal para potenciar la recuperación, impulsar el crecimiento muscular y optimizar el rendimiento físico. La elección definitiva para atletas que exigen calidad suprema en cada dosis.</p>
                        <div class="galeria-producto">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0024.jpg" alt="ZERO CARBS GORILLA - Vista 1" onclick="ampliarImagen(this)">
                            <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0025.jpg" alt="ZERO CARBS GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <!-- <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0022.jpg" alt="ZERO CARBS GORILLA - Vista 3" onclick="ampliarImagen(this)"> -->
                        </div>
                        <button class="btn-producto" onclick="verProducto('zero')">VER DETALLES</button>
                    </div>
                </div>
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0028.jpg" alt="COLÁGENO HIDROLIZADO GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>COLÁGENO HIDROLIZADO <span class="txtRojo">GORILLA</span> LÍQUIDO</h3>
                        <p>Fórmula avanzada de colágeno en formato líquido para máxima absorción y biodisponibilidad. Potencia la elasticidad de la piel, fortalece articulaciones, tendones y ligamentos mientras promueve un cabello y uñas más fuertes. Diseñado con tecnología de hidrolización que asegura una asimilación inmediata y resultados visibles. La solución definitiva para regeneración tisular y recuperación acelerada para deportistas exigentes.</p>
                        <div class="galeria-producto">
                            <!-- <img src="img/resistencia.png" alt="COLÁGENO HIDROLIZADO GORILLA - Vista 1" onclick="ampliarImagen(this)">
                            <img src="img/resistencia.png" alt="COLÁGENO HIDROLIZADO GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <img src="img/resistencia.png" alt="COLÁGENO HIDROLIZADO GORILLA - Vista 3" onclick="ampliarImagen(this)"> -->
                        </div>
                        <button class="btn-producto" onclick="verProducto('colageno_500')">VER DETALLES</button>
                    </div>
                </div>
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0031.jpg" alt="GLUTAMINA GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>GLUTAMINA <span class="txtRojo">GORILLA</span></h3>
                        <p>Aminoácido esencial para optimizar la recuperación muscular, reforzar el sistema inmunológico y preservar la masa muscular durante entrenamientos intensos. Formulada con tecnología de absorción avanzada que maximiza la síntesis proteica y acelera la regeneración del tejido muscular. La clave para romper barreras de rendimiento y minimizar el tiempo de recuperación entre sesiones.</p>
                        <div class="galeria-producto">
                            <!-- <img src="img/resistencia.png" alt="GLUTAMINA GORILLA - Vista 1" onclick="ampliarImagen(this)">
                            <img src="img/resistencia.png" alt="GLUTAMINA GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <img src="img/resistencia.png" alt="GLUTAMINA GORILLA - Vista 3" onclick="ampliarImagen(this)"> -->
                        </div>
                        <button class="btn-producto" onclick="verProducto('glutamina')">VER DETALLES</button>
                    </div>
                </div>
                <div class="producto-card">
                    <div class="producto-img">
                        <img src="img/Reto/Productos/Brochure Gorilla 2023_page-0032.jpg" alt="BRAIN RECOVERY GORILLA" onclick="ampliarImagen(this)">
                    </div>
                    <div class="producto-info">
                        <h3>BRAIN RECOVERY <span class="txtRojo">GORILLA</span></h3>
                        <p>Fórmula neuropotenciadora avanzada con quinua, inulina, maca, chontaduro y complejo vitamínico B completo. Enriquecida con citrulina, isoleucina, magnesio, zinc y biotina para maximizar la función cerebral, potenciar la concentración y acelerar la recuperación cognitiva. Diseñada para atletas que buscan optimizar tanto el rendimiento mental como físico, reducir el estrés y mantener claridad mental incluso en los entrenamientos más exigentes.</p>
                        <div class="galeria-producto">
                            <!-- <img src="img/resistencia.png" alt="BRAIN RECOVERY GORILLA - Vista 1" onclick="ampliarImagen(this)">
                            <img src="img/resistencia.png" alt="BRAIN RECOVERY GORILLA - Vista 2" onclick="ampliarImagen(this)">
                            <img src="img/resistencia.png" alt="BRAIN RECOVERY GORILLA - Vista 3" onclick="ampliarImagen(this)"> -->
                        </div>
                        <button class="btn-producto" onclick="verProducto('brain_recovery')">VER DETALLES</button>
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

    <!-- SECCIÓN RUTINAS -->
    <section id="rutinas" class="rutinas-seccion">
        <div class="contenedor">
            <div class="titulo-seccion">
                <div class="numero">03</div>
                <h2>TUS <span class="txtRojo">RUTINAS</span></h2>
            </div>
            <p class="descripcion-rutinas">Hemos diseñado rutinas específicas para cada objetivo. Haz clic en los días para ver el detalle de cada entrenamiento.</p>
            
            <div class="tabs-container">
                <div class="tabs">
                    <button class="tab-btn active" onclick="cambiarTabRutina('rutina-bajar')">RUTINA PÉRDIDA DE PESO</button>
                    <button class="tab-btn" onclick="cambiarTabRutina('rutina-aumentar')">RUTINA GANANCIA MUSCULAR</button>
                </div>
                
                <div id="rutina-bajar" class="tab-content active">
                    <div class="calendario-rutina">
                        <div class="semana">
                            <div class="dia" onclick="mostrarRutina('bajar', 1)">
                                <h4>DÍA 1</h4>
                                <p><i class="material-icons-sharp">fitness_center</i> HIIT + Core</p>
                            </div>
                            <div class="dia" onclick="mostrarRutina('bajar', 2)">
                                <h4>DÍA 2</h4>
                                <p><i class="material-icons-sharp">directions_run</i> Fuerza Tren Inferior</p>
                            </div>
                            <div class="dia" onclick="mostrarRutina('bajar', 3)">
                                <h4>DÍA 3</h4>
                                <p><i class="material-icons-sharp">favorite</i> Cardio Steady State</p>
                            </div>
                            <div class="dia" onclick="mostrarRutina('bajar', 4)">
                                <h4>DÍA 4</h4>
                                <p><i class="material-icons-sharp">fitness_center</i> Fuerza Tren Superior</p>
                            </div>
                            <div class="dia" onclick="mostrarRutina('bajar', 5)">
                                <h4>DÍA 5</h4>
                                <p><i class="material-icons-sharp">flash_on</i> Circuito Metabólico</p>
                            </div>
                            <div class="dia descanso" onclick="mostrarRutina('bajar', 6)">
                                <h4>DÍA 6</h4>
                                <p><i class="material-icons-sharp">self_improvement</i> Recuperación Activa</p>
                            </div>
                            <div class="dia descanso" onclick="mostrarRutina('bajar', 7)">
                                <h4>DÍA 7</h4>
                                <p><i class="material-icons-sharp">hotel</i> Descanso Total</p>
                            </div>
                        </div>
                    </div>
                    <div id="detalle-rutina-bajar" class="detalle-rutina">
                        <h3>Selecciona un día para ver el detalle de la rutina</h3>
                    </div>
                </div>
                
                <div id="rutina-aumentar" class="tab-content">
                    <div class="calendario-rutina">
                        <div class="semana">
                            <div class="dia" onclick="mostrarRutina('aumentar', 1)">
                                <h4>DÍA 1</h4>
                                <p><i class="material-icons-sharp">fitness_center</i> Pecho y Tríceps</p>
                            </div>
                            <div class="dia" onclick="mostrarRutina('aumentar', 2)">
                                <h4>DÍA 2</h4>
                                <p><i class="material-icons-sharp">fitness_center</i> Espalda y Bíceps</p>
                            </div>
                            <div class="dia descanso" onclick="mostrarRutina('aumentar', 3)">
                                <h4>DÍA 3</h4>
                                <p><i class="material-icons-sharp">directions_walk</i> Descanso o Cardio Suave</p>
                            </div>
                            <div class="dia" onclick="mostrarRutina('aumentar', 4)">
                                <h4>DÍA 4</h4>
                                <p><i class="material-icons-sharp">fitness_center</i> Piernas y Glúteos</p>
                            </div>
                            <div class="dia" onclick="mostrarRutina('aumentar', 5)">
                                <h4>DÍA 5</h4>
                                <p><i class="material-icons-sharp">fitness_center</i> Hombros y Abdomen</p>
                            </div>
                            <div class="dia" onclick="mostrarRutina('aumentar', 6)">
                                <h4>DÍA 6</h4>
                                <p><i class="material-icons-sharp">flash_on</i> Entrenamiento Compuesto</p>
                            </div>
                            <div class="dia descanso" onclick="mostrarRutina('aumentar', 7)">
                                <h4>DÍA 7</h4>
                                <p><i class="material-icons-sharp">hotel</i> Descanso Total</p>
                            </div>
                        </div>
                    </div>
                    <div id="detalle-rutina-aumentar" class="detalle-rutina">
                        <h3>Selecciona un día para ver el detalle de la rutina</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN NUTRICIÓN -->
    <section id="nutricion" class="nutricion-seccion">
        <div class="contenedor">
            <div class="titulo-seccion">
                <div class="numero">04</div>
                <h2>PLAN DE <span class="txtRojo">NUTRICIÓN</span></h2>
            </div>
            <p class="descripcion-nutricion">La nutrición es el 70% del éxito en cualquier transformación física. Sigue estas pautas nutricionales diseñadas específicamente para tu objetivo.</p>
            
            <div class="tabs-container">
                <div class="tabs">
                    <button class="tab-btn active" onclick="cambiarTabNutricion('nutricion-bajar')">NUTRICIÓN PÉRDIDA DE PESO</button>
                    <button class="tab-btn" onclick="cambiarTabNutricion('nutricion-aumentar')">NUTRICIÓN GANANCIA MUSCULAR</button>
                </div>
                
                <div id="nutricion-bajar" class="tab-content active">
                    <div class="plan-nutricion">
                        <div class="nutricion-img">
                            <img src="img/principios/bajarPeso.jpg" alt="Plan nutricional pérdida de peso">
                        </div>
                        <div class="nutricion-info">
                            <h3>PRINCIPIOS NUTRICIONALES PARA <span class="txtRojo">PÉRDIDA DE PESO</span></h3>
                            <ul class="nutricion-lista">
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Déficit calórico controlado:</strong> 300-500 calorías por debajo de tu mantenimiento</li>
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Proteína elevada:</strong> 2g por kg de peso corporal</li>
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Carbohidratos moderados:</strong> Concentrados alrededor del entrenamiento</li>
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Grasas saludables:</strong> 0.8g por kg de peso corporal</li>
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Hidratación:</strong> Mínimo 3 litros de agua diarios</li>
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Timing nutricional:</strong> 4-5 comidas distribuidas durante el día</li>
                            </ul>
                            <button class="btn-plan" onclick="descargarPlan('bajar')">DESCARGAR PLAN COMPLETO</button>
                        </div>
                    </div>
                </div>
                
                <div id="nutricion-aumentar" class="tab-content">
                    <div class="plan-nutricion">
                        <div class="nutricion-img">
                            <img src="img/principios/aumento.jpg" alt="Plan nutricional ganancia muscular">
                        </div>
                        <div class="nutricion-info">
                            <h3>PRINCIPIOS NUTRICIONALES PARA <span class="txtRojo">GANANCIA MUSCULAR</span></h3>
                            <ul class="nutricion-lista">
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Superávit calórico:</strong> 300-500 calorías por encima de tu mantenimiento</li>
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Proteína elevada:</strong> 2.2g por kg de peso corporal</li>
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Carbohidratos altos:</strong> 4-5g por kg de peso corporal</li>
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Grasas moderadas:</strong> 1g por kg de peso corporal</li>
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Hidratación:</strong> Mínimo 3-4 litros de agua diarios</li>
                                <li><i class="material-icons-sharp">restaurant</i> <strong>Timing nutricional:</strong> 5-6 comidas distribuidas durante el día</li>
                            </ul>
                            {{-- <button class="btn-plan" onclick="descargarPlan('aumentar')">DESCARGAR PLAN COMPLETO</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN TESTIMONIOS -->
    <section id="testimonios" class="testimonios-seccion">
        <div class="contenedor">
            <div class="titulo-seccion">
                <div class="numero">05</div>
                <h2>HISTORIAS DE <span class="txtRojo">ÉXITO</span></h2>
            </div>
            <p class="descripcion-testimonios">Conoce a quienes ya han completado el Reto de 30 Días y han transformado sus vidas con GORILLA TEAM.</p>
            
            <div class="testimonios-grid">
                <div class="testimonio-card">
                    <div class="testimonio-img">
                        <img src="img/resenas/carlos.jpg" alt="Testimonio 1">
                    </div>
                    <div class="testimonio-info">
                        <h3>CARLOS M.</h3>
                        <p class="resultado">-12kg en 30 días</p>
                        <p class="testimonio-texto">"El Reto GORILLA cambió mi vida. No solo perdí peso, sino que gané energía, confianza y un nuevo estilo de vida. Los productos son increíbles y el plan es fácil de seguir."</p>
                    </div>
                </div>
                
                <div class="testimonio-card">
                    <div class="testimonio-img">
                        <img src="img/resenas/laura.jpg" alt="Testimonio 2">
                    </div>
                    <div class="testimonio-info">
                        <h3>LAURA S.</h3>
                        <p class="resultado">+5kg de músculo en 30 días</p>
                        <p class="testimonio-texto">"Siempre había luchado para ganar masa muscular hasta que encontré el Reto GORILLA. La combinación de rutinas, nutrición y suplementos es perfecta. ¡Los resultados hablan por sí solos!"</p>
                    </div>
                </div>
                
                <div class="testimonio-card">
                    <div class="testimonio-img">
                        <img src="img/resenas/miguel.jpg" alt="Testimonio 3">
                    </div>
                    <div class="testimonio-info">
                        <h3>MIGUEL A.</h3>
                        <p class="resultado">Transformación completa en 30 días</p>
                        <p class="testimonio-texto">"Perdí 8kg de grasa y gané 3kg de músculo. Mi cuerpo cambió completamente. La energía que te dan los productos GORILLA es incomparable. ¡Recomendado al 100%!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN SOPORTE -->
    <section class="soporte-seccion">
        <div class="contenedor">
            <div class="soporte-info">
                <h2>¿NECESITAS <span class="txtRojo">AYUDA</span>?</h2>
                <p>Nuestro equipo de expertos está disponible para resolver todas tus dudas y brindarte el apoyo que necesitas durante tu reto de 30 días.</p>
                <div class="soporte-contacto">
                    <div class="contacto-item">
                        <i class="material-icons-sharp">phone</i>
                        <p>304 - 589 5681</p>
                    </div>
                    <div class="contacto-item">
                        <i class="material-icons-sharp">email</i>
                        <p>gorillateam.global@gmail.com</p>
                    </div>
                    {{-- <div class="contacto-item">
                        <i class="material-icons-sharp">chat</i>
                        <p>Chat en vivo: Lun-Sáb 8:00-20:00</p>
                    </div> --}}
                </div>
                {{-- <button class="btn-soporte" onclick="abrirChat()">CHAT CON UN EXPERTO</button> --}}
            </div>
        </div>
    </section>

    <footer>
        <div class="info">
            <p>2025 - <span class="txtRojo">ONE DMENTE</span> Todos los derechos reservados</p>
            <div class="redes">
                <a href="#">
                    <a href="https://www.facebook.com/GorillaMasters"><i class="material-icons-sharp">facebook</i></a>
                </a>
                {{-- <a href="#">
                    <i class="material-icons-sharp"> rocket_launch </i>
                </a>
                <a href="#">
                    <i class="material-icons-sharp"> rocket_launch </i>
                </a>
                <a href="#">
                    <i class="material-icons-sharp"> rocket_launch </i>
                </a> --}}
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/reto.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>

</body>
</html>