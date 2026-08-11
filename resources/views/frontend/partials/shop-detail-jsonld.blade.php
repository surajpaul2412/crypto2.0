@php
    $productUrl = route('shop.show', ['slug' => $product->slug]);

    $productSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        '@id' => "{$productUrl}#product",
        'name' => $product->name,
        'description' => $product->tagline,
        'category' => ucfirst($product->format),
        'url' => $productUrl,
        'brand' => ['@id' => 'https://cryptocipher.in/#organization'],
        'image' => $product->imageUrl(),
        'offers' => [
            '@type' => 'Offer',
            'priceCurrency' => 'USD',
            'price' => (string) $product->price,
            'availability' => 'https://schema.org/InStock',
            'url' => $productUrl,
            'seller' => ['@id' => 'https://cryptocipher.in/#organization'],
        ],
    ];

    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Instruments', 'item' => route('shop')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $product->name, 'item' => $productUrl],
        ],
    ];

    $definedTermSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'DefinedTermSet',
        '@id' => 'https://cryptocipher.in/glossary#indian-classical',
        'name' => 'Indian classical music glossary',
        'hasDefinedTerm' => [
            [
                '@type' => 'DefinedTerm',
                '@id' => 'https://cryptocipher.in/glossary#raga',
                'name' => 'Raga',
                'description' => 'A melodic framework in Indian classical music - a set of notes with rules for ascent, descent, and characteristic phrases that define a mood.',
            ],
            [
                '@type' => 'DefinedTerm',
                '@id' => 'https://cryptocipher.in/glossary#gharana',
                'name' => 'Gharana',
                'description' => 'A lineage or school of Indian classical music, transmitting a distinct style of phrasing and ornamentation from teacher to student across generations.',
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($definedTermSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
