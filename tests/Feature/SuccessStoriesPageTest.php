<?php

namespace Tests\Feature;

use Tests\TestCase;

class SuccessStoriesPageTest extends TestCase
{
    public function test_success_stories_page_uses_static_site_shell(): void
    {
        $html = view('frontend.success-stories')->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('story-card', $html);
        $this->assertStringContainsString('.story-modal__video-play', $html);
        $this->assertStringContainsString('.story-modal__credit', $html);
        $this->assertStringContainsString('<base href="' . rtrim(asset('frontend'), '/') . '/">', $html);
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
        $this->assertStringNotContainsString('content: """;', $html);
    }
}
