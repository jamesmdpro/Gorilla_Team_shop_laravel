@extends('layouts.app')

@section('title', 'Suplementos Deportivos | GORILLA TEAM - Proteína, Creatina, Pre-Entreno')
@section('description', 'Descubre nuestra línea completa de suplementos deportivos GORILLA TEAM. Proteína whey, creatina, pre-entreno, BCAA y más. Calidad premium para atletas y entusiastas del fitness.')
@section('keywords', 'suplementos deportivos, proteína whey, creatina monohidrato, pre-entreno, BCAA, aminoácidos, fitness, musculación, gorilla team, suplementos colombia')

@push('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "Suplementos Deportivos GORILLA TEAM",
    "description": "Línea completa de suplementos deportivos de alta calidad para atletas y entusiastas del fitness",
    "url": "{{ url('/suplementos-deportivos') }}",
    "mainEntity": {
        "@type": "ItemList",
        "name": "Suplementos Deportivos",
        "itemListElement": [
            {
                "@type": "Product",
                "position": 1,
                "name": "Proteína Whey GORILLA",
                "description": "Proteína de suero de alta calidad para desarrollo muscular",
                "category": "Suplementos Deportivos"
            },
            {
                "@type": "Product",
                "position": 2,
                "name": "Creatina Monohidrato GORILLA",
                "description": "Creatina pura para aumentar fuerza y potencia",
                "category": "Suplementos Deportivos"
            },
            {
                "@type": "Product",
                "position": 3,
                "name": "Pre-Entreno GORILLA",
                "description": "Fórmula energizante para maximizar el rendimiento",
                "category": "Suplementos Deportivos"
            }
        ]
    }
}
</script>
@endpush

@section('content')
<main role="main">
    <!-- Hero Section -->
    <section class="hero-productos" role="region" aria-labelledby="productos-hero-title">
        <div class="contenido-seccion">
            <div class="hero-content">
                <h1 id="productos-hero-title">SUPLEMENTOS DEPORTIVOS <span class="txtRojo">GORILLA TEAM</span></h1>
                <p class="hero-subtitle">Rompe las cadenas que limitan tu potencial. Descubre los suplementos que transformarán tu rendimiento.</p>
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Inicio</a></li>
                        <li aria-current="page">Suplementos Deportivos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Filtros de productos -->
    <section class="filtros-productos" role="region" aria-labelledby="filtros-title">
        <div class="contenido-seccion">
            <h2 id="filtros-title" class="sr-only">Filtros de productos</h2>
            <div class="filtros-container">
                <button class="filtro-btn active" data-filter="todos" aria-pressed="true">Todos los Productos</button>
                <button class="filtro-btn" data-filter="proteina" aria-pressed="false">Proteínas</button>
                <button class="filtro-btn" data-filter="creatina" aria-pressed="false">Creatina</button>
                <button class="filtro-btn" data-filter="pre-entreno" aria-pressed="false">Pre-Entreno</button>
                <button class="filtro-btn" data-filter="bcaa" aria-pressed="false">BCAA</button>
                <button class="filtro-btn" data-filter="quemadores" aria-pressed="false">Quemadores</button>
            </div>
        </div>
    </section>

    <!-- Grid de productos -->
    <section class="productos-grid" role="region" aria-labelledby="productos-grid-title">
        <div class="contenido-seccion">
            <h2 id="productos-grid-title">Nuestros Productos</h2>
            <div class="grid-container" role="list">
                
                <!-- Producto 1: Proteína Whey -->
                <article class="producto-card" data-category="proteina" role="listitem">
                    <div class="producto-imagen">
                        <img src="{{ asset('img/Productos/producto1.jpg') }}" alt="Proteína Whey GORILLA TEAM - Desarrollo muscular" loading="lazy">
                        <div class="producto-overlay">
                            <button class="btn-ver-detalles" data-product="proteina-whey" aria-label="Ver detalles de Proteína Whey">Ver Detalles</button>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>Proteína Whey GORILLA</h3>
                        <p class="producto-categoria">Proteínas</p>
                        <p class="producto-descripcion">Proteína de suero de alta calidad para máximo desarrollo muscular y recuperación.</p>
                        <div class="producto-precio">
                            <span class="precio-actual">$89.900</span>
                            <span class="precio-anterior">$99.900</span>
                        </div>
                        <button class="btn-agregar-carrito" data-product-id="1" aria-label="Agregar Proteína Whey al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito
                        </button>
                    </div>
                </article>

                <!-- Producto 2: Creatina -->
                <article class="producto-card" data-category="creatina" role="listitem">
                    <div class="producto-imagen">
                        <img src="{{ asset('img/Productos/producto2.jpg') }}" alt="Creatina Monohidrato GORILLA TEAM - Fuerza y potencia" loading="lazy">
                        <div class="producto-overlay">
                            <button class="btn-ver-detalles" data-product="creatina" aria-label="Ver detalles de Creatina">Ver Detalles</button>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>Creatina Monohidrato GORILLA</h3>
                        <p class="producto-categoria">Creatina</p>
                        <p class="producto-descripcion">Creatina pura para aumentar fuerza, potencia y volumen muscular.</p>
                        <div class="producto-precio">
                            <span class="precio-actual">$45.900</span>
                        </div>
                        <button class="btn-agregar-carrito" data-product-id="2" aria-label="Agregar Creatina al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito
                        </button>
                    </div>
                </article>

                <!-- Producto 3: Pre-Entreno -->
                <article class="producto-card" data-category="pre-entreno" role="listitem">
                    <div class="producto-imagen">
                        <img src="{{ asset('img/Productos/producto3.jpg') }}" alt="Pre-Entreno GORILLA TEAM - Energía y rendimiento" loading="lazy">
                        <div class="producto-overlay">
                            <button class="btn-ver-detalles" data-product="pre-entreno" aria-label="Ver detalles de Pre-Entreno">Ver Detalles</button>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>Pre-Entreno GORILLA FURY</h3>
                        <p class="producto-categoria">Pre-Entreno</p>
                        <p class="producto-descripcion">Fórmula explosiva para maximizar energía, foco y rendimiento en cada entrenamiento.</p>
                        <div class="producto-precio">
                            <span class="precio-actual">$65.900</span>
                            <span class="precio-anterior">$75.900</span>
                        </div>
                        <button class="btn-agregar-carrito" data-product-id="3" aria-label="Agregar Pre-Entreno al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito
                        </button>
                    </div>
                </article>

                <!-- Producto 4: BCAA -->
                <article class="producto-card" data-category="bcaa" role="listitem">
                    <div class="producto-imagen">
                        <img src="{{ asset('img/Productos/producto4.jpg') }}" alt="BCAA GORILLA TEAM - Aminoácidos esenciales" loading="lazy">
                        <div class="producto-overlay">
                            <button class="btn-ver-detalles" data-product="bcaa" aria-label="Ver detalles de BCAA">Ver Detalles</button>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>BCAA GORILLA RECOVERY</h3>
                        <p class="producto-categoria">Aminoácidos</p>
                        <p class="producto-descripcion">Aminoácidos de cadena ramificada para recuperación muscular y resistencia.</p>
                        <div class="producto-precio">
                            <span class="precio-actual">$55.900</span>
                        </div>
                        <button class="btn-agregar-carrito" data-product-id="4" aria-label="Agregar BCAA al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito
                        </button>
                    </div>
                </article>

                <!-- Producto 5: Quemador de Grasa -->
                <article class="producto-card" data-category="quemadores" role="listitem">
                    <div class="producto-imagen">
                        <img src="{{ asset('img/Productos/producto5.jpg') }}" alt="Quemador de Grasa GORILLA TEAM - Definición muscular" loading="lazy">
                        <div class="producto-overlay">
                            <button class="btn-ver-detalles" data-product="quemador" aria-label="Ver detalles de Quemador de Grasa">Ver Detalles</button>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>GORILLA BURN</h3>
                        <p class="producto-categoria">Quemadores</p>
                        <p class="producto-descripcion">Fórmula termogénica avanzada para acelerar el metabolismo y definición muscular.</p>
                        <div class="producto-precio">
                            <span class="precio-actual">$79.900</span>
                            <span class="precio-anterior">$89.900</span>
                        </div>
                        <button class="btn-agregar-carrito" data-product-id="5" aria-label="Agregar Quemador de Grasa al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito
                        </button>
                    </div>
                </article>

                <!-- Producto 6: Multivitamínico -->
                <article class="producto-card" data-category="vitaminas" role="listitem">
                    <div class="producto-imagen">
                        <img src="{{ asset('img/Productos/producto6.jpg') }}" alt="Multivitamínico GORILLA TEAM - Salud y bienestar" loading="lazy">
                        <div class="producto-overlay">
                            <button class="btn-ver-detalles" data-product="multivitaminico" aria-label="Ver detalles de Multivitamínico">Ver Detalles</button>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>GORILLA MULTI</h3>
                        <p class="producto-categoria">Vitaminas</p>
                        <p class="producto-descripcion">Complejo multivitamínico y mineral para atletas de alto rendimiento.</p>
                        <div class="producto-precio">
                            <span class="precio-actual">$39.900</span>
                        </div>
                        <button class="btn-agregar-carrito" data-product-id="6" aria-label="Agregar Multivitamínico al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito
                        </button>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- Sección de beneficios -->
    <section class="beneficios-productos" role="region" aria-labelledby="beneficios-title">
        <div class="contenido-seccion">
            <h2 id="beneficios-title">¿Por qué elegir GORILLA TEAM?</h2>
            <div class="beneficios-grid">
                <div class="beneficio-item">
                    <i class="material-icons-sharp" aria-hidden="true">verified</i>
                    <h3>Calidad Garantizada</h3>
                    <p>Todos nuestros productos pasan por rigurosos controles de calidad y están certificados.</p>
                </div>
                <div class="beneficio-item">
                    <i class="material-icons-sharp" aria-hidden="true">local_shipping</i>
                    <h3>Envío Gratis</h3>
                    <p>Envío nacional gratuito en todos los pedidos. Recibe tus productos en la comodidad de tu hogar.</p>
                </div>
                <div class="beneficio-item">
                    <i class="material-icons-sharp" aria-hidden="true">support_agent</i>
                    <h3>Soporte Experto</h3>
                    <p>Nuestro equipo de especialistas te asesora para elegir los mejores productos según tus objetivos.</p>
                </div>
                <div class="beneficio-item">
                    <i class="material-icons-sharp" aria-hidden="true">payments</i>
                    <h3>Pago Seguro</h3>
                    <p>Múltiples opciones de pago seguras, incluyendo pago contra entrega.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-productos" role="region" aria-labelledby="faq-title">
        <div class="contenido-seccion">
            <h2 id="faq-title">Preguntas Frecuentes</h2>
            <div class="faq-container">
                <details class="faq-item">
                    <summary>¿Cuál es la diferencia entre proteína whey y caseína?</summary>
                    <p>La proteína whey se absorbe rápidamente, ideal para post-entreno, mientras que la caseína se absorbe lentamente, perfecta para antes de dormir.</p>
                </details>
                <details class="faq-item">
                    <summary>¿Cuándo debo tomar creatina?</summary>
                    <p>La creatina se puede tomar en cualquier momento del día. Lo importante es la consistencia diaria para mantener los niveles musculares saturados.</p>
                </details>
                <details class="faq-item">
                    <summary>¿Los suplementos tienen efectos secundarios?</summary>
                    <p>Nuestros productos son seguros cuando se usan según las indicaciones. Siempre consulta con un profesional de la salud antes de comenzar cualquier suplementación.</p>
                </details>
                <details class="faq-item">
                    <summary>¿Ofrecen garantía en los productos?</summary>
                    <p>Sí, todos nuestros productos tienen garantía de satisfacción. Si no estás completamente satisfecho, te devolvemos tu dinero.</p>
                </details>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
// Filtros de productos
document.addEventListener('DOMContentLoaded', function() {
    const filtros = document.querySelectorAll('.filtro-btn');
    const productos = document.querySelectorAll('.producto-card');

    filtros.forEach(filtro => {
        filtro.addEventListener('click', function() {
            const categoria = this.dataset.filter;
            
            // Actualizar botones activos
            filtros.forEach(btn => {
                btn.classList.remove('active');
                btn.setAttribute('aria-pressed', 'false');
            });
            this.classList.add('active');
            this.setAttribute('aria-pressed', 'true');

            // Filtrar productos
            productos.forEach(producto => {
                if (categoria === 'todos' || producto.dataset.category === categoria) {
                    producto.style.display = 'block';
                } else {
                    producto.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endpush