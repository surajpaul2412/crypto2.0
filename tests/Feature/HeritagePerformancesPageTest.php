<?php

namespace Tests\Feature;

use Tests\TestCase;

class HeritagePerformancesPageTest extends TestCase
{
    public function test_heritage_performances_page_uses_static_site_shell(): void
    {
        $html = view('frontend.heritage-performances')->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('heritage', strtolower($html));
        $this->assertStringContainsString('<base href="' . rtrim(asset('frontend'), '/') . '/">', $html);
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
    }
}
