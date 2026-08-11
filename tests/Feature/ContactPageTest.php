<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactPageTest extends TestCase
{
    public function test_contact_page_uses_static_site_shell(): void
    {
        $html = view('frontend.contact')->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('Contact', $html);
        $this->assertStringContainsString('cchub', $html);
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
    }
}
