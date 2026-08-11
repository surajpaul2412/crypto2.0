<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_about_page_uses_static_site_shell(): void
    {
        $html = view('frontend.about')->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('Crypto Cipher Audio Lab', $html);
        $this->assertStringContainsString('abt-main', $html);
        $this->assertStringContainsString('<base href="' . rtrim(asset('frontend'), '/') . '/">', $html);
    }
}
