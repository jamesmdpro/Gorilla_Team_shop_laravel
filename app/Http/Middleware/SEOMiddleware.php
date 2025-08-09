<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SEOMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only process HTML responses
        if ($response->headers->get('Content-Type') && 
            strpos($response->headers->get('Content-Type'), 'text/html') !== false) {
            
            $content = $response->getContent();
            
            // Add structured data if not present
            if (strpos($content, '@context') === false) {
                $organizationData = $this->getOrganizationStructuredData();
                $structuredDataScript = '<script type="application/ld+json">' . 
                                      json_encode($organizationData, JSON_UNESCAPED_SLASHES) . 
                                      '</script>';
                
                // Insert before closing head tag
                $content = str_replace('</head>', $structuredDataScript . '</head>', $content);
            }
            
            // Add Open Graph image if not present
            if (strpos($content, 'property="og:image"') === false) {
                $ogImageTag = '<meta property="og:image" content="' . asset('img/LOGO_GORILLA_TEAM.png') . '">';
                $content = str_replace('</head>', $ogImageTag . '</head>', $content);
            }
            
            // Optimize images with lazy loading
            $content = preg_replace(
                '/<img(?![^>]*loading=)([^>]*?)>/i',
                '<img loading="lazy"$1>',
                $content
            );
            
            $response->setContent($content);
        }

        return $response;
    }

    private function getOrganizationStructuredData()
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'GORILLA TEAM',
            'url' => url('/'),
            'logo' => asset('img/LOGO_GORILLA_TEAM.png'),
            'description' => 'Tienda especializada en suplementos deportivos de alta calidad para atletas y entusiastas del fitness',
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => 'CO'
            ],
            'sameAs' => [
                'https://www.facebook.com/GorillaMasters'
            ]
        ];
    }
}