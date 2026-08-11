<?php

namespace Tests\Feature;

use Tests\TestCase;

class TermsOfServicePageTest extends TestCase
{
    public function test_terms_of_service_page_uses_static_site_shell(): void
    {
        $html = view('frontend.terms-of-service')->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('legal-section', $html);
        $this->assertStringContainsString('Terms of <em>Service</em>', $html);
        $this->assertStringContainsString('https://cryptocipher.in/terms-of-service', $html);
        $this->assertStringContainsString('setDrawerState', $html);
        $this->assertStringContainsString('<base href="' . rtrim(asset('frontend'), '/') . '/">', $html);
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
        $this->assertStringNotContainsString('includes/bootstrap.php', $html);
        $this->assertStringNotContainsString('require __DIR__', $html);
        $this->assertStringNotContainsString('href="/privacy"', $html);
        $this->assertStringNotContainsString('href="/about"', $html);
        $this->assertStringNotContainsString('href="/contact"', $html);
        $this->assertStringNotContainsString('href="/heritage"', $html);
        $this->assertStringNotContainsString('Ã¢', $html);
        $this->assertStringNotContainsString('Ã‚', $html);
        $this->assertStringNotContainsString('Ãƒ', $html);
        $this->assertSame(1, substr_count($html, '<main id="main"'));
        $this->assertSame(1, substr_count($html, 'id="cc-nav-mobile"'));
    }
}
