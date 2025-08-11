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
                "name": "Proteína Mass GORILLA",
                "description": "Proteína premium de absorción rápida y lenta para recuperación y crecimiento muscular",
                "category": "Suplementos Deportivos"
            },
            {
                "@type": "Product",
                "position": 2,
                "name": "Creatina GORILLA",
                "description": "Creatina monohidrato pura para aumentar fuerza y potencia",
                "category": "Suplementos Deportivos"
            },
            {
                "@type": "Product",
                "position": 3,
                "name": "BCAA GORILLA",
                "description": "Aminoácidos de cadena ramificada para recuperación muscular",
                "category": "Suplementos Deportivos"
            }
        ]
    }
}
</script>
@endpush

@push('styles')
<style>
    /* Estilos para el carrusel de productos */
    .producto-carousel {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        height: 250px;
    }

    .carousel-container {
        display: flex;
        transition: transform 0.3s ease;
        height: 100%;
    }

    .carousel-slide {
        min-width: 100%;
        height: 100%;
    }

    .carousel-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: background 0.3s ease;
    }

    .carousel-nav:hover {
        background: rgba(0, 0, 0, 0.8);
    }

    .carousel-prev {
        left: 10px;
    }

    .carousel-next {
        right: 10px;
    }

    .carousel-indicators {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 5px;
    }

    .carousel-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .carousel-indicator.active {
        background: white;
    }

    /* Estilos para las variantes de productos */
    .producto-variants {
        margin: 15px 0;
    }

    .variant-selector {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 15px;
    }

    .variant-option {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 12px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .variant-option:hover {
        border-color: #ff6b35;
        background-color: #fff5f2;
    }

    .variant-option.selected {
        border-color: #ff6b35;
        background-color: #ff6b35;
        color: white;
    }

    .variant-name {
        font-weight: 500;
    }

    .variant-price {
        font-weight: bold;
        color: #ff6b35;
    }

    .variant-option.selected .variant-price {
        color: white;
    }

    .variant-servings {
        font-size: 12px;
        opacity: 0.8;
    }

    /* Estilos mejorados para las tarjetas de productos */
    .producto-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .producto-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    .producto-info {
        padding: 20px;
    }

    .producto-info h3 {
        font-size: 1.2em;
        font-weight: 700;
        margin-bottom: 8px;
        color: #333;
        line-height: 1.3;
    }

    .producto-categoria {
        color: #ff6b35;
        font-weight: 600;
        font-size: 0.9em;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .producto-descripcion {
        color: #666;
        font-size: 0.9em;
        line-height: 1.5;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .btn-ver-detalles, .btn-agregar-carrito {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-bottom: 10px;
    }

    .btn-ver-detalles {
        background: #f8f9fa;
        color: #333;
        border: 2px solid #e0e0e0;
    }

    .btn-ver-detalles:hover {
        background: #e9ecef;
        border-color: #ccc;
    }

    .btn-agregar-carrito {
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        color: white;
        font-size: 0.95em;
    }

    .btn-agregar-carrito:hover {
        background: linear-gradient(135deg, #e55a2b, #e67a35);
        transform: translateY(-2px);
    }

    .btn-agregar-carrito:disabled {
        background: #ccc;
        cursor: not-allowed;
        transform: none;
    }

    /* Filtros mejorados */
    .filtros-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin-bottom: 40px;
    }

    .filtro-btn {
        padding: 12px 24px;
        border: 2px solid #e0e0e0;
        background: white;
        color: #333;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .filtro-btn:hover {
        border-color: #ff6b35;
        color: #ff6b35;
    }

    .filtro-btn.active {
        background: #ff6b35;
        border-color: #ff6b35;
        color: white;
    }

    /* Grid responsivo */
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    @media (max-width: 768px) {
        .grid-container {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .filtros-container {
            flex-direction: column;
            align-items: center;
        }
        
        .filtro-btn {
            width: 100%;
            max-width: 300px;
        }
    }

    /* Indicador de stock */
    .stock-indicator {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #28a745;
        color: white;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.8em;
        font-weight: 600;
    }

    .stock-indicator.low-stock {
        background: #ffc107;
        color: #333;
    }

    .stock-indicator.out-of-stock {
        background: #dc3545;
    }
</style>
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
                <button class="filtro-btn" data-filter="aminoacidos" aria-pressed="false">Aminoácidos</button>
                <button class="filtro-btn" data-filter="creatina" aria-pressed="false">Creatina</button>
                <button class="filtro-btn" data-filter="suplementos" aria-pressed="false">Suplementos</button>
                <button class="filtro-btn" data-filter="especiales" aria-pressed="false">Especiales</button>
            </div>
        </div>
    </section>

    <!-- Grid de productos -->
    <section class="productos-grid" role="region" aria-labelledby="productos-grid-title">
        <div class="contenido-seccion">
            <h2 id="productos-grid-title">Nuestros Productos</h2>
            <div class="grid-container" role="list" id="productos-container">
                
                <!-- Producto 1: Proteína Mass Gorilla -->
                <article class="producto-card" data-category="proteina" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="proteina">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/proteina-mass-1.jpg') }}" alt="Proteína Mass GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/proteina-mass-2.jpg') }}" alt="Proteína Mass GORILLA - Información nutricional" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/proteina-mass-3.jpg') }}" alt="Proteína Mass GORILLA - Preparación" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>PROTEÍNA MASS GORILLA</h3>
                        <p class="producto-categoria">Proteínas</p>
                        <p class="producto-descripcion">Nuestra proteína premium de absorción rápida y lenta, ideal para recuperación y crecimiento muscular.</p>
                        
                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="proteina">
                                <div class="variant-option" data-variant="Gorilla Mass 2.3LB (1050g)" data-price="69000" data-servings="30">
                                    <div>
                                        <div class="variant-name">Gorilla Mass 2.3LB (1050g)</div>
                                        <div class="variant-servings">30 porciones</div>
                                    </div>
                                    <div class="variant-price">$69.000</div>
                                </div>
                                <div class="variant-option" data-variant="Gorilla Mass 5LB (2270g)" data-price="159000" data-servings="65">
                                    <div>
                                        <div class="variant-name">Gorilla Mass 5LB (2270g)</div>
                                        <div class="variant-servings">65 porciones</div>
                                    </div>
                                    <div class="variant-price">$159.000</div>
                                </div>
                                <div class="variant-option" data-variant="Gorilla Mass 10LB (4540g)" data-price="262000" data-servings="130">
                                    <div>
                                        <div class="variant-name">Gorilla Mass 10LB (4540g)</div>
                                        <div class="variant-servings">130 porciones</div>
                                    </div>
                                    <div class="variant-price">$262.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('proteina')" aria-label="Ver detalles de Proteína Mass">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="proteina" aria-label="Agregar Proteína Mass al carrito" disabled>
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Selecciona una presentación
                        </button>
                    </div>
                </article>

                <!-- Producto 2: Ripped Gorilla -->
                <article class="producto-card" data-category="proteina" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="ripped">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/ripped-1.jpg') }}" alt="Ripped GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/ripped-2.jpg') }}" alt="Ripped GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>RIPPED GORILLA</h3>
                        <p class="producto-categoria">Proteínas</p>
                        <p class="producto-descripcion">Fórmula avanzada con 24g de proteína enriquecida con artichofas, cáscara de papa, resveratrol e inulina para definición muscular.</p>
                        
                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="ripped">
                                <div class="variant-option" data-variant="Gorilla Ripped / Ripped Fit 2LB" data-price="149000" data-servings="30">
                                    <div>
                                        <div class="variant-name">Gorilla Ripped 2LB</div>
                                        <div class="variant-servings">30 porciones</div>
                                    </div>
                                    <div class="variant-price">$149.000</div>
                                </div>
                                <div class="variant-option" data-variant="Gorilla Ripped / Ripped Fit 4LB" data-price="259000" data-servings="60">
                                    <div>
                                        <div class="variant-name">Gorilla Ripped 4LB</div>
                                        <div class="variant-servings">60 porciones</div>
                                    </div>
                                    <div class="variant-price">$259.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('ripped')" aria-label="Ver detalles de Ripped Gorilla">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="ripped" aria-label="Agregar Ripped Gorilla al carrito" disabled>
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Selecciona una presentación
                        </button>
                    </div>
                </article>

                <!-- Producto 3: ISO Complex Gorilla -->
                <article class="producto-card" data-category="proteina" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="isocomplex">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/iso-complex-1.jpg') }}" alt="ISO Complex GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/iso-complex-2.jpg') }}" alt="ISO Complex GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>ISO COMPLEX GORILLA</h3>
                        <p class="producto-categoria">Proteínas</p>
                        <p class="producto-descripcion">Aislado de proteína de suero de leche de alta pureza para máxima absorción y resultados.</p>
                        
                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="isocomplex">
                                <div class="variant-option" data-variant="Gorilla ISOCOMPLEX 2LB" data-price="149000" data-servings="30">
                                    <div>
                                        <div class="variant-name">Gorilla ISOCOMPLEX 2LB</div>
                                        <div class="variant-servings">30 porciones</div>
                                    </div>
                                    <div class="variant-price">$149.000</div>
                                </div>
                                <div class="variant-option" data-variant="Gorilla ISOCOMPLEX 4LB" data-price="259000" data-servings="60">
                                    <div>
                                        <div class="variant-name">Gorilla ISOCOMPLEX 4LB</div>
                                        <div class="variant-servings">60 porciones</div>
                                    </div>
                                    <div class="variant-price">$259.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('isocomplex')" aria-label="Ver detalles de ISO Complex">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="isocomplex" aria-label="Agregar ISO Complex al carrito" disabled>
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Selecciona una presentación
                        </button>
                    </div>
                </article>

                <!-- Producto 4: Zero Carbs Gorilla -->
                <article class="producto-card" data-category="proteina" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="zero">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/zero-carbs-1.jpg') }}" alt="Zero Carbs GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/zero-carbs-2.jpg') }}" alt="Zero Carbs GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>ZERO CARBS GORILLA</h3>
                        <p class="producto-categoria">Proteínas</p>
                        <p class="producto-descripcion">Proteína sin carbohidratos para definición muscular y control de peso.</p>
                        
                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="zero">
                                <div class="variant-option" data-variant="Gorilla ZERO CARBS 2.2LB" data-price="139000" data-servings="30">
                                    <div>
                                        <div class="variant-name">Gorilla ZERO CARBS 2.2LB</div>
                                        <div class="variant-servings">30 porciones</div>
                                    </div>
                                    <div class="variant-price">$139.000</div>
                                </div>
                                <div class="variant-option" data-variant="Gorilla ZERO CARBS 4LB" data-price="239000" data-servings="60">
                                    <div>
                                        <div class="variant-name">Gorilla ZERO CARBS 4LB</div>
                                        <div class="variant-servings">60 porciones</div>
                                    </div>
                                    <div class="variant-price">$239.000</div>
                                </div>
                                <div class="variant-option" data-variant="Gorilla ZERO CARBS 10LB" data-price="449000" data-servings="150">
                                    <div>
                                        <div class="variant-name">Gorilla ZERO CARBS 10LB</div>
                                        <div class="variant-servings">150 porciones</div>
                                    </div>
                                    <div class="variant-price">$449.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('zero')" aria-label="Ver detalles de Zero Carbs">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="zero" aria-label="Agregar Zero Carbs al carrito" disabled>
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Selecciona una presentación
                        </button>
                    </div>
                </article>

                <!-- Producto 5: BCAA Gorilla -->
                <article class="producto-card" data-category="aminoacidos" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="BCAA">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/bcaa-1.jpg') }}" alt="BCAA GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/bcaa-2.jpg') }}" alt="BCAA GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>BCAA GORILLA</h3>
                        <p class="producto-categoria">Aminoácidos</p>
                        <p class="producto-descripcion">Aminoácidos de cadena ramificada de alta calidad para optimizar la recuperación muscular y reducir la fatiga.</p>
                        
                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="BCAA">
                                <div class="variant-option selected" data-variant="Gorilla BCAA 500g" data-price="99000" data-servings="50">
                                    <div>
                                        <div class="variant-name">Gorilla BCAA 500g</div>
                                        <div class="variant-servings">50 porciones</div>
                                    </div>
                                    <div class="variant-price">$99.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('BCAA')" aria-label="Ver detalles de BCAA">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="BCAA" aria-label="Agregar BCAA al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito - $99.000
                        </button>
                    </div>
                </article>

                <!-- Producto 6: Creatina Gorilla -->
                <article class="producto-card" data-category="creatina" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="creatina">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/creatina-1.jpg') }}" alt="Creatina GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/creatina-2.jpg') }}" alt="Creatina GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>CREATINA GORILLA</h3>
                        <p class="producto-categoria">Creatina</p>
                        <p class="producto-descripcion">Creatina monohidrato pura para aumentar la fuerza, potencia muscular y mejorar la recuperación.</p>
                        
                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="creatina">
                                <div class="variant-option selected" data-variant="Gorilla CREATINA 300g" data-price="89000" data-servings="60">
                                    <div>
                                        <div class="variant-name">Gorilla CREATINA 300g</div>
                                        <div class="variant-servings">60 porciones</div>
                                    </div>
                                    <div class="variant-price">$89.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('creatina')" aria-label="Ver detalles de Creatina">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="creatina" aria-label="Agregar Creatina al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito - $89.000
                        </button>
                    </div>
                </article>

                <!-- Producto 7: Colágeno Gorilla -->
                <article class="producto-card" data-category="suplementos" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="colageno_500">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/colageno-1.jpg') }}" alt="Colágeno GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/colageno-2.jpg') }}" alt="Colágeno GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>COLÁGENO HIDROLIZADO GORILLA LÍQUIDO</h3>
                        <p class="producto-categoria">Suplementos</p>
                        <p class="producto-descripcion">Fórmula avanzada de colágeno en formato líquido para máxima absorción y biodisponibilidad.</p>
                        
                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="colageno_500">
                                <div class="variant-option selected" data-variant="Gorilla COLÁGENO 500ml" data-price="49000" data-servings="30">
                                    <div>
                                        <div class="variant-name">Gorilla COLÁGENO 500ml</div>
                                        <div class="variant-servings">30 porciones</div>
                                    </div>
                                    <div class="variant-price">$49.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('colageno_500')" aria-label="Ver detalles de Colágeno">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="colageno_500" aria-label="Agregar Colágeno al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito - $49.000
                        </button>
                    </div>
                </article>

                <!-- Producto 8: Glutamina Gorilla -->
                <article class="producto-card" data-category="aminoacidos" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="glutamina">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/glutamina-1.jpg') }}" alt="Glutamina GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/glutamina-2.jpg') }}" alt="Glutamina GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>GLUTAMINA GORILLA</h3>
                        <p class="producto-categoria">Aminoácidos</p>
                        <p class="producto-descripcion">Aminoácido esencial para recuperación muscular y fortalecimiento del sistema inmune.</p>
                        
                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="glutamina">
                                <div class="variant-option selected" data-variant="Gorilla GLUTAMINA 300g" data-price="59000" data-servings="60">
                                    <div>
                                        <div class="variant-name">Gorilla GLUTAMINA 300g</div>
                                        <div class="variant-servings">60 porciones</div>
                                    </div>
                                    <div class="variant-price">$59.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('glutamina')" aria-label="Ver detalles de Glutamina">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="glutamina" aria-label="Agregar Glutamina al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito - $59.000
                        </button>
                    </div>
                </article>

                <!-- Producto 9: Beta Alanina -->
                <article class="producto-card" data-category="suplementos" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="beta_alanina">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/beta-alanina-1.jpg') }}" alt="Beta Alanina GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/beta-alanina-2.jpg') }}" alt="Beta Alanina GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>GORILLA BETA ALANINA</h3>
                        <p class="producto-categoria">Suplementos</p>
                        <p class="producto-descripcion">Mejora el rendimiento y retrasa la fatiga muscular durante entrenamientos intensos.</p>

                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="beta_alanina">
                                <div class="variant-option selected" data-variant="Gorilla BETA ALANINA 300g" data-price="59000" data-servings="60">
                                    <div>
                                        <div class="variant-name">Gorilla BETA ALANINA 300g</div>
                                        <div class="variant-servings">60 porciones</div>
                                    </div>
                                    <div class="variant-price">$59.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('beta_alanina')" aria-label="Ver detalles de Beta Alanina">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="beta_alanina" aria-label="Agregar Beta Alanina al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito - $59.000
                        </button>
                    </div>
                </article>

                <!-- Producto 10: Cafeína Gorilla -->
                <article class="producto-card" data-category="suplementos" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="cafeina">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/cafeina-1.jpg') }}" alt="Cafeína GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/cafeina-2.jpg') }}" alt="Cafeína GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>GORILLA CAFEÍNA</h3>
                        <p class="producto-categoria">Suplementos</p>
                        <p class="producto-descripcion">Energía y concentración en cápsulas para maximizar tu rendimiento.</p>

                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="cafeina">
                                <div class="variant-option selected" data-variant="Gorilla CAFEÍNA 100 CAPS" data-price="49000" data-servings="100">
                                    <div>
                                        <div class="variant-name">Gorilla CAFEÍNA 100 CAPS</div>
                                        <div class="variant-servings">100 cápsulas</div>
                                    </div>
                                    <div class="variant-price">$49.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('cafeina')" aria-label="Ver detalles de Cafeína">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="cafeina" aria-label="Agregar Cafeína al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito - $49.000
                        </button>
                    </div>
                </article>

                <!-- Producto 11: Test Boost Gorilla -->
                <article class="producto-card" data-category="suplementos" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="test_boost">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/test-boost-1.jpg') }}" alt="Test Boost GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/test-boost-2.jpg') }}" alt="Test Boost GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>TEST BOOST GORILLA</h3>
                        <p class="producto-categoria">Suplementos</p>
                        <p class="producto-descripcion">Potenciador natural de testosterona para mejorar el rendimiento y la masa muscular.</p>

                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="test_boost">
                                <div class="variant-option selected" data-variant="Gorilla TEST BOOST 500g" data-price="105000" data-servings="30">
                                    <div>
                                        <div class="variant-name">Gorilla TEST BOOST 500g</div>
                                        <div class="variant-servings">30 porciones</div>
                                    </div>
                                    <div class="variant-price">$105.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('test_boost')" aria-label="Ver detalles de Test Boost">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="test_boost" aria-label="Agregar Test Boost al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito - $105.000
                        </button>
                    </div>
                </article>

                <!-- Producto 12: Brain Recovery Gorilla -->
                <article class="producto-card" data-category="especiales" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="brain_recovery">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/brain-recovery-1.jpg') }}" alt="Brain Recovery GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/brain-recovery-2.jpg') }}" alt="Brain Recovery GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>BRAIN RECOVERY GORILLA</h3>
                        <p class="producto-categoria">Especiales</p>
                        <p class="producto-descripcion">Fórmula para recuperación cognitiva y mental, mejora el enfoque y la concentración.</p>

                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="brain_recovery">
                                <div class="variant-option selected" data-variant="Gorilla BRAIN RECOVERY 1000g" data-price="109000" data-servings="50">
                                    <div>
                                        <div class="variant-name">Gorilla BRAIN RECOVERY 1000g</div>
                                        <div class="variant-servings">50 porciones</div>
                                    </div>
                                    <div class="variant-price">$109.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('brain_recovery')" aria-label="Ver detalles de Brain Recovery">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="brain_recovery" aria-label="Agregar Brain Recovery al carrito">
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Agregar al Carrito - $109.000
                        </button>
                    </div>
                </article>

                <!-- Producto 13: Gorilla 1000 -->
                <article class="producto-card" data-category="proteina" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="gorilla_1000">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/gorilla-1000-1.jpg') }}" alt="Gorilla 1000 - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/gorilla-1000-2.jpg') }}" alt="Gorilla 1000 - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>GORILLA 1000</h3>
                        <p class="producto-categoria">Proteínas</p>
                        <p class="producto-descripcion">Proteína económica para principiantes, ideal para quienes inician su journey fitness.</p>

                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="gorilla_1000">
                                <div class="variant-option" data-variant="Gorilla 1000 X 2LB (910g)" data-price="59000" data-servings="30">
                                    <div>
                                        <div class="variant-name">Gorilla 1000 X 2LB (910g)</div>
                                        <div class="variant-servings">30 porciones</div>
                                    </div>
                                    <div class="variant-price">$59.000</div>
                                </div>
                                <div class="variant-option" data-variant="Gorilla 1000 X 5LB (2270g)" data-price="139000" data-servings="75">
                                    <div>
                                        <div class="variant-name">Gorilla 1000 X 5LB (2270g)</div>
                                        <div class="variant-servings">75 porciones</div>
                                    </div>
                                    <div class="variant-price">$139.000</div>
                                </div>
                                <div class="variant-option" data-variant="Gorilla 1000 X 10LB (4540g)" data-price="239000" data-servings="150">
                                    <div>
                                        <div class="variant-name">Gorilla 1000 X 10LB (4540g)</div>
                                        <div class="variant-servings">150 porciones</div>
                                    </div>
                                    <div class="variant-price">$239.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('gorilla_1000')" aria-label="Ver detalles de Gorilla 1000">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="gorilla_1000" aria-label="Agregar Gorilla 1000 al carrito" disabled>
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Selecciona una presentación
                        </button>
                    </div>
                </article>

                <!-- Producto 14: Whey 100% Gorilla -->
                <article class="producto-card" data-category="proteina" role="listitem">
                    <div class="stock-indicator">En Stock</div>
                    <div class="producto-carousel" data-product="whey">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/whey-1.jpg') }}" alt="Whey 100% GORILLA - Vista frontal" loading="lazy">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('img/Productos/whey-2.jpg') }}" alt="Whey 100% GORILLA - Información nutricional" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-nav carousel-prev" aria-label="Imagen anterior">‹</button>
                        <button class="carousel-nav carousel-next" aria-label="Siguiente imagen">›</button>
                        <div class="carousel-indicators">
                            <span class="carousel-indicator active"></span>
                            <span class="carousel-indicator"></span>
                        </div>
                    </div>
                    <div class="producto-info">
                        <h3>WHEY 100% GORILLA</h3>
                        <p class="producto-categoria">Proteínas</p>
                        <p class="producto-descripcion">Proteína con café para energía y nutrición matutina, perfecta para empezar el día.</p>

                        <div class="producto-variants">
                            <div class="variant-selector" data-product-id="whey">
                                <div class="variant-option" data-variant="Gorilla WHEY MORNING 1LB - Café" data-price="69000" data-servings="15">
                                    <div>
                                        <div class="variant-name">Gorilla WHEY MORNING 1LB - Café</div>
                                        <div class="variant-servings">15 porciones</div>
                                    </div>
                                    <div class="variant-price">$69.000</div>
                                </div>
                                <div class="variant-option" data-variant="Gorilla GOLD MORNING 2LB - Café" data-price="69000" data-servings="30">
                                    <div>
                                        <div class="variant-name">Gorilla GOLD MORNING 2LB - Café</div>
                                        <div class="variant-servings">30 porciones</div>
                                    </div>
                                    <div class="variant-price">$69.000</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn-ver-detalles" onclick="verProducto('whey')" aria-label="Ver detalles de Whey 100%">
                            <i class="material-icons-sharp">visibility</i>
                            Ver Detalles
                        </button>
                        <button class="btn-agregar-carrito" data-product-id="whey" aria-label="Agregar Whey 100% al carrito" disabled>
                            <i class="material-icons-sharp">add_shopping_cart</i>
                            Selecciona una presentación
                        </button>
                    </div>
                </article>



            </div>
        </div>
    </section>
</main>

@push('scripts')
<script src="{{ asset('js/cart.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar carruseles
    initializeCarousels();
    
    // Inicializar selectores de variantes
    initializeVariantSelectors();
    
    // Inicializar filtros
    initializeFilters();
});

function initializeCarousels() {
    const carousels = document.querySelectorAll('.producto-carousel');
    
    carousels.forEach(carousel => {
        const container = carousel.querySelector('.carousel-container');
        const slides = carousel.querySelectorAll('.carousel-slide');
        const prevBtn = carousel.querySelector('.carousel-prev');
        const nextBtn = carousel.querySelector('.carousel-next');
        const indicators = carousel.querySelectorAll('.carousel-indicator');
        
        let currentSlide = 0;
        
        function updateCarousel() {
            container.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlide);
            });
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            updateCarousel();
        }
        
        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateCarousel();
        }
        
        prevBtn.addEventListener('click', prevSlide);
        nextBtn.addEventListener('click', nextSlide);
        
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                updateCarousel();
            });
        });
        
        // Auto-play (opcional)
        setInterval(nextSlide, 5000);
    });
}

function initializeVariantSelectors() {
    const variantSelectors = document.querySelectorAll('.variant-selector');
    
    variantSelectors.forEach(selector => {
        const productId = selector.dataset.productId;
        const variants = selector.querySelectorAll('.variant-option');
        const addToCartBtn = selector.closest('.producto-card').querySelector('.btn-agregar-carrito');
        
        variants.forEach(variant => {
            variant.addEventListener('click', function() {
                // Remover selección anterior
                variants.forEach(v => v.classList.remove('selected'));
                
                // Seleccionar nueva variante
                this.classList.add('selected');
                
                // Actualizar botón de agregar al carrito
                const variantName = this.dataset.variant;
                const price = parseInt(this.dataset.price);
                const formattedPrice = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP',
                    minimumFractionDigits: 0
                }).format(price);
                
                addToCartBtn.disabled = false;
                addToCartBtn.innerHTML = `
                    <i class="material-icons-sharp">add_shopping_cart</i>
                    Agregar al Carrito - ${formattedPrice}
                `;
                
                // Actualizar datos del botón
                addToCartBtn.dataset.variant = variantName;
                addToCartBtn.dataset.price = price;
            });
        });
        
        // Manejar click en agregar al carrito
        addToCartBtn.addEventListener('click', function() {
            if (!this.disabled) {
                const selectedVariant = selector.querySelector('.variant-option.selected');
                if (selectedVariant) {
                    const variantName = selectedVariant.dataset.variant;
                    const price = parseInt(selectedVariant.dataset.price);
                    
                    addToCart(productId, variantName, price);
                    
                    // Feedback visual
                    this.innerHTML = '<i class="material-icons-sharp">check</i> ¡Agregado!';
                    setTimeout(() => {
                        const formattedPrice = new Intl.NumberFormat('es-CO', {
                            style: 'currency',
                            currency: 'COP',
                            minimumFractionDigits: 0
                        }).format(price);
                        this.innerHTML = `<i class="material-icons-sharp">add_shopping_cart</i> Agregar al Carrito - ${formattedPrice}`;
                    }, 2000);
                }
            }
        });
    });
}

function initializeFilters() {
    const filtros = document.querySelectorAll('.filtro-btn');
    const productos = document.querySelectorAll('.producto-card');
    
    filtros.forEach(filtro => {
        filtro.addEventListener('click', function() {
            // Actualizar botones activos
            filtros.forEach(f => {
                f.classList.remove('active');
                f.setAttribute('aria-pressed', 'false');
            });
            
            this.classList.add('active');
            this.setAttribute('aria-pressed', 'true');
            
            const filter = this.dataset.filter;
            
            // Filtrar productos
            productos.forEach(producto => {
                if (filter === 'todos' || producto.dataset.category === filter) {
                    producto.style.display = 'block';
                    setTimeout(() => {
                        producto.style.opacity = '1';
                        producto.style.transform = 'translateY(0)';
                    }, 100);
                } else {
                    producto.style.opacity = '0';
                    producto.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        producto.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
}
</script>
@endpush
@endsection