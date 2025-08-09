<?php

namespace App\Helpers;

class SEOHelper
{
    /**
     * Generate meta tags for a page
     */
    public static function generateMetaTags($page, $data = [])
    {
        $config = config('seo');
        $defaults = $config['meta_defaults'];
        
        $meta = [
            'title' => $data['title'] ?? $config['site_name'],
            'description' => $data['description'] ?? $config['site_description'],
            'keywords' => $data['keywords'] ?? $config['site_keywords'],
            'robots' => $data['robots'] ?? $defaults['robots'],
            'canonical' => $data['canonical'] ?? url()->current(),
            'og_title' => $data['og_title'] ?? ($data['title'] ?? $config['site_name']),
            'og_description' => $data['og_description'] ?? ($data['description'] ?? $config['site_description']),
            'og_image' => $data['og_image'] ?? asset('img/LOGO_GORILLA_TEAM.png'),
            'og_url' => $data['og_url'] ?? url()->current(),
            'og_type' => $data['og_type'] ?? $defaults['og_type'],
            'twitter_title' => $data['twitter_title'] ?? ($data['title'] ?? $config['site_name']),
            'twitter_description' => $data['twitter_description'] ?? ($data['description'] ?? $config['site_description']),
            'twitter_image' => $data['twitter_image'] ?? asset('img/LOGO_GORILLA_TEAM.png'),
        ];

        return $meta;
    }

    /**
     * Generate structured data for products
     */
    public static function generateProductStructuredData($product)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product['name'],
            'description' => $product['description'],
            'image' => $product['image'],
            'brand' => [
                '@type' => 'Brand',
                'name' => 'GORILLA TEAM'
            ],
            'offers' => [
                '@type' => 'Offer',
                'price' => $product['price'],
                'priceCurrency' => 'COP',
                'availability' => 'https://schema.org/InStock',
                'seller' => [
                    '@type' => 'Organization',
                    'name' => 'GORILLA TEAM'
                ]
            ],
            'category' => $product['category'] ?? 'Suplementos Deportivos'
        ];
    }

    /**
     * Generate breadcrumb structured data
     */
    public static function generateBreadcrumbStructuredData($breadcrumbs)
    {
        $items = [];
        foreach ($breadcrumbs as $index => $breadcrumb) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $breadcrumb['name'],
                'item' => $breadcrumb['url']
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items
        ];
    }

    /**
     * Generate FAQ structured data
     */
    public static function generateFAQStructuredData($faqs)
    {
        $questions = [];
        foreach ($faqs as $faq) {
            $questions[] = [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer']
                ]
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $questions
        ];
    }

    /**
     * Generate organization structured data
     */
    public static function generateOrganizationStructuredData()
    {
        $config = config('seo');
        
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $config['site_name'],
            'url' => $config['site_url'],
            'logo' => asset('img/LOGO_GORILLA_TEAM.png'),
            'description' => $config['site_description'],
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => $config['business']['country']
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => $config['contact']['phone'],
                'contactType' => 'customer service',
                'email' => $config['contact']['email']
            ],
            'sameAs' => array_filter([
                $config['social']['facebook'],
                $config['social']['instagram'],
                $config['social']['twitter'],
                $config['social']['youtube']
            ])
        ];
    }

    /**
     * Clean and optimize text for SEO
     */
    public static function optimizeText($text, $maxLength = null)
    {
        // Remove extra whitespace
        $text = preg_replace('/\s+/', ' ', trim($text));
        
        // Truncate if needed
        if ($maxLength && strlen($text) > $maxLength) {
            $text = substr($text, 0, $maxLength - 3) . '...';
        }
        
        return $text;
    }

    /**
     * Generate slug from text
     */
    public static function generateSlug($text)
    {
        // Convert to lowercase
        $slug = strtolower($text);
        
        // Replace special characters
        $slug = str_replace(['á', 'é', 'í', 'ó', 'ú', 'ñ'], ['a', 'e', 'i', 'o', 'u', 'n'], $slug);
        
        // Remove non-alphanumeric characters except hyphens
        $slug = preg_replace('/[^a-z0-9\-]/', '-', $slug);
        
        // Remove multiple hyphens
        $slug = preg_replace('/-+/', '-', $slug);
        
        // Remove leading/trailing hyphens
        $slug = trim($slug, '-');
        
        return $slug;
    }
}