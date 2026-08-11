<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShopPageTest extends TestCase
{
    public function test_shop_page_uses_static_site_shell(): void
    {
        $html = view('frontend.shop', [
            'products' => collect(),
            'sort' => 'default',
        ])->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('frontend/assets/css/polish.css', $html);
        $this->assertStringContainsString('<main id="main"', $html);
        $this->assertStringContainsString('id="cc-nav-mobile"', $html);
        $this->assertStringContainsString('href="/shop/solo-dholak"', $html);
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
        $this->assertStringNotContainsString('includes/bootstrap.php', $html);
        $this->assertStringNotContainsString("require __DIR__ . '/includes/header.php';", $html);
        $this->assertStringNotContainsString("require __DIR__ . '/includes/footer.php';", $html);
        $this->assertStringNotContainsString("href=\"/shop/' + lib.slug + '\"", $html);
        $this->assertStringNotContainsString("href=\"/instruments/' + lib.slug + '\"", $html);
    }
}
