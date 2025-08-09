<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SEO Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the SEO configuration for the GORILLA TEAM website
    |
    */

    'site_name' => 'GORILLA TEAM',
    'site_description' => 'Tienda especializada en suplementos deportivos de alta calidad para atletas y entusiastas del fitness',
    'site_keywords' => 'suplementos deportivos, proteína whey, creatina, pre-entreno, BCAA, fitness, musculación, resistencia, gorilla team, suplementos colombia',
    'site_author' => 'GORILLA TEAM',
    'site_url' => env('APP_URL', 'https://gorillateam.com'),
    
    'social' => [
        'facebook' => 'https://www.facebook.com/GorillaMasters',
        'instagram' => '',
        'twitter' => '',
        'youtube' => '',
    ],

    'contact' => [
        'phone' => '+57 300 123 4567',
        'email' => 'info@gorillateam.com',
        'address' => 'Colombia',
    ],

    'business' => [
        'type' => 'Store',
        'opening_hours' => 'Mo-Su 00:00-23:59',
        'payment_accepted' => 'Cash, Credit Card',
        'price_range' => '$$',
        'country' => 'CO',
    ],

    'products' => [
        'categories' => [
            'proteina' => [
                'name' => 'Proteínas',
                'description' => 'Proteínas de alta calidad para desarrollo muscular',
                'keywords' => 'proteína whey, caseína, proteína vegetal, desarrollo muscular'
            ],
            'creatina' => [
                'name' => 'Creatina',
                'description' => 'Creatina monohidrato para fuerza y potencia',
                'keywords' => 'creatina monohidrato, fuerza, potencia, volumen muscular'
            ],
            'pre-entreno' => [
                'name' => 'Pre-Entreno',
                'description' => 'Fórmulas energizantes para maximizar el rendimiento',
                'keywords' => 'pre-entreno, energía, rendimiento, foco, concentración'
            ],
            'bcaa' => [
                'name' => 'BCAA',
                'description' => 'Aminoácidos de cadena ramificada para recuperación',
                'keywords' => 'BCAA, aminoácidos, recuperación muscular, resistencia'
            ],
            'quemadores' => [
                'name' => 'Quemadores de Grasa',
                'description' => 'Fórmulas termogénicas para definición muscular',
                'keywords' => 'quemador de grasa, termogénico, definición, metabolismo'
            ],
        ]
    ],

    'meta_defaults' => [
        'robots' => 'index, follow',
        'og_type' => 'website',
        'twitter_card' => 'summary_large_image',
    ],

    'structured_data' => [
        'organization' => [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'GORILLA TEAM',
            'description' => 'Tienda especializada en suplementos deportivos de alta calidad para atletas y entusiastas del fitness',
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => 'CO'
            ],
        ],
        'website' => [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'GORILLA TEAM',
            'description' => 'Tienda especializada en suplementos deportivos de alta calidad',
        ],
        'store' => [
            '@context' => 'https://schema.org',
            '@type' => 'Store',
            'name' => 'GORILLA TEAM',
            'description' => 'Tienda especializada en suplementos deportivos para atletas y entusiastas del fitness',
            'openingHours' => 'Mo-Su 00:00-23:59',
            'paymentAccepted' => 'Cash, Credit Card',
            'priceRange' => '$$'
        ]
    ]
];