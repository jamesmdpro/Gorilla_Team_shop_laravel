<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'GORILLA TEAM - Suplementos Deportivos | Conquista Tu Destino')</title>
    <meta name="description" content="@yield('description', 'Descubre los suplementos deportivos de GORILLA TEAM. Rompe las cadenas que te mantienen débil y conquista tu verdadero potencial físico. ¡La resistencia comienza aquí!')">
    <meta name="keywords" content="@yield('keywords', 'suplementos deportivos, proteína, creatina, pre-entreno, fitness, musculación, resistencia, gorilla team, suplementos colombia')">
    <meta name="author" content="GORILLA TEAM">
    <meta name="robots" content="@yield('robots', 'index, follow')">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'GORILLA TEAM - Suplementos Deportivos | Conquista Tu Destino')">
    <meta property="og:description" content="@yield('og_description', 'Descubre los suplementos deportivos de GORILLA TEAM. Rompe las cadenas que te mantienen débil y conquista tu verdadero potencial físico.')">
    <meta property="og:image" content="@yield('og_image', asset('img/LOGO_GORILLA_TEAM.png'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="GORILLA TEAM">
    <meta property="og:locale" content="es_ES">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'GORILLA TEAM - Suplementos Deportivos')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Conquista tu destino con los mejores suplementos deportivos')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('img/LOGO_GORILLA_TEAM.png'))">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    <!-- Hreflang for international SEO -->
    <link rel="alternate" hreflang="es" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="es-CO" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">
    
    <!-- Favicon optimizado -->
    <link rel="icon" href="{{ asset('img/LOGO_GORILLA_TEAM.png') }}" type="image/png" sizes="32x32">
    <link rel="icon" href="{{ asset('img/LOGO_GORILLA_TEAM.png') }}" type="image/png" sizes="48x48">
    <link rel="icon" href="{{ asset('img/LOGO_GORILLA_TEAM.png') }}" type="image/png" sizes="96x96">
    <link rel="apple-touch-icon" href="{{ asset('img/LOGO_GORILLA_TEAM.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/LOGO_GORILLA_TEAM.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/LOGO_GORILLA_TEAM.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('img/LOGO_GORILLA_TEAM.png') }}">
    <meta name="msapplication-TileImage" content="{{ asset('img/LOGO_GORILLA_TEAM.png') }}">
    <meta name="msapplication-TileColor" content="#ff1133">
    
    <!-- Preconnect para mejorar performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200;400;600;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popup-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seo-styles.css') }}">

    <!-- Schema.org JSON-LD -->
    @stack('structured-data')

    <!-- Additional head content -->
    @stack('head')
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popup-styles.css') }}">
    
    <!-- Schema.org JSON-LD -->
    @stack('structured-data')
    
    <!-- Additional head content -->
    @stack('head')
</head>
<body>
    <!-- Google Tag Manager (noscript) - Placeholder for future implementation -->
    <noscript>
        <!-- GTM code will go here -->
    </noscript>
    
    @yield('content')
    
    <!-- Scripts -->
    @stack('scripts')
    
    <!-- Schema.org Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "GORILLA TEAM",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('img/LOGO_GORILLA_TEAM.png') }}",
        "description": "Tienda especializada en suplementos deportivos de alta calidad para atletas y entusiastas del fitness",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "CO"
        },
        "sameAs": [
            "https://www.facebook.com/GorillaMasters"
        ]
    }
    </script>
</body>
</html>