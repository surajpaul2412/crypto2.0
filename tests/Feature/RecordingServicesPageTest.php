<?php

namespace Tests\Feature;

use Tests\TestCase;

class RecordingServicesPageTest extends TestCase
{
    public function test_recording_services_page_uses_static_site_shell(): void
    {
        $html = view('frontend.recording-services')->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('recsvc', $html);
        $this->assertStringContainsString('frontend/assets/css/polish.css', $html);
        $this->assertStringContainsString('lenis@1.1.13/dist/lenis.min.js', $html);
        $this->assertStringContainsString('gsap/3.12.5/gsap.min.js', $html);
        $this->assertStringContainsString('ScrollTrigger.min.js', $html);
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
        $this->assertStringNotContainsString('includes/bootstrap.php', $html);
        $this->assertSame(1, substr_count($html, '<main id="main"'));
        $this->assertSame(1, substr_count($html, 'id="cc-nav-mobile"'));
    }
}
