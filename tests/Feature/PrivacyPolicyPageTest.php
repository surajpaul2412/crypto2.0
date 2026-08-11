<?php

namespace Tests\Feature;

use Tests\TestCase;

class PrivacyPolicyPageTest extends TestCase
{
    public function test_privacy_policy_page_uses_static_site_shell(): void
    {
        $html = view('frontend.privacy-policy')->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('legal-section', $html);
        $this->assertStringContainsString('<base href="' . rtrim(asset('frontend'), '/') . '/">', $html);
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
    }
}
