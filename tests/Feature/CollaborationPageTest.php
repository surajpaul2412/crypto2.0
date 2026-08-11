<?php

namespace Tests\Feature;

use Tests\TestCase;

class CollaborationPageTest extends TestCase
{
    public function test_collaboration_page_uses_static_site_shell(): void
    {
        $html = view('frontend.collaboration')->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('collab', strtolower($html));
        $this->assertStringContainsString('<base href="' . rtrim(asset('frontend'), '/') . '/">', $html);
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
    }
}
