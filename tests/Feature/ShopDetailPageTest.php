<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShopDetailPageTest extends TestCase
{
    public function test_localized_shop_detail_route_redirects_to_static_slug(): void
    {
        $response = $this->get('/en/shop/voices-of-ancient-india');

        $response->assertRedirect('/en/shop/solo-dholak');
    }

    public function test_shop_detail_page_uses_static_site_shell(): void
    {
        $product = [
            'name' => 'Voices of Ancient India',
            'slug' => 'solo-dholak',
            'edition' => 'Kontakt 6+',
            'meta_description' => 'Sanskrit shlokas, Sufi qawwali, devotional alaaps. A virtual instrument for Kontakt 6+. Three master Indian vocalists, recorded in our Delhi studio. 8.4 GB · sync-cleared · AI-training-free. From Crypto Cipher Audio Lab.',
            'og_image' => 'https://cryptocipher.in/og/library-inner.png?v=1',
            'price' => 129,
        ];

        $html = view('frontend.shop-detail', [
            'product' => $product,
            'relatedProducts' => collect(),
        ])->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('frontend/assets/css/polish.css', $html);
        $this->assertStringContainsString('frontend/assets/css/tokens.css', $html);
        $this->assertStringContainsString('frontend/assets/css/base.css', $html);
        $this->assertStringContainsString('frontend/assets/css/system.css', $html);
        $this->assertStringContainsString('frontend/assets/css/shell.css', $html);
        $this->assertStringContainsString('https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js', $html);
        $this->assertStringContainsString('frontend/assets/js/cc-demo-player.js?v=dur1', $html);
        $this->assertStringContainsString('frontend/assets/js/polish.js', $html);
        $this->assertStringContainsString('frontend/assets/img/logo.svg', $html);
        $this->assertStringContainsString('<main id="main"', $html);
        $this->assertStringContainsString('id="cc-nav-mobile"', $html);
        $this->assertStringContainsString('Voices of Ancient India', $html);
        $this->assertStringContainsString('"@context":"https://schema.org"', str_replace(' ', '', $html));
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
        $this->assertStringNotContainsString('includes/bootstrap.php', $html);
        $this->assertStringNotContainsString('href="tokens.css"', $html);
        $this->assertStringNotContainsString('href="base.css"', $html);
        $this->assertStringNotContainsString('href="system.css"', $html);
        $this->assertStringNotContainsString('href="shell.css"', $html);
        $this->assertStringNotContainsString('src="logo.svg"', $html);
        $this->assertStringNotContainsString('src="polish.js"', $html);
        $this->assertStringNotContainsString('src="cc-demo-player.js?v=dur1"', $html);
        $this->assertStringNotContainsString("require __DIR__ . '/includes/header.php';", $html);
        $this->assertStringNotContainsString("require __DIR__ . '/includes/footer.php';", $html);
    }
}
