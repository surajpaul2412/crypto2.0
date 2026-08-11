<?php

namespace Tests\Feature;

use Tests\TestCase;

class CookiePolicyPageTest extends TestCase
{
    public function test_cookie_policy_page_uses_static_site_shell(): void
    {
        $html = view('frontend.cookie-policy')->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('legal-section', $html);
        $this->assertStringContainsString('<base href="' . rtrim(asset('frontend'), '/') . '/">', $html);
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
    }
}
