<?php

namespace Tests\Feature;

use Tests\TestCase;

class RecordingServicesInnerPageTest extends TestCase
{
    public function test_recording_services_inner_page_uses_static_site_shell(): void
    {
        $instrument = (object) [
            'name' => 'Sitar',
            'slug' => 'sitar',
            'meta_description' => 'Custom sitar recording sessions with Indian master musicians.',
        ];

        $html = view('frontend.recording-services-inner', compact('instrument'))->render();

        $this->assertStringContainsString('cc-nav', $html);
        $this->assertStringContainsString('ft__wrap', $html);
        $this->assertStringContainsString('instr', $html);
        $this->assertStringContainsString('Sitar', $html);
        $this->assertStringContainsString('frontend/assets/css/polish.css', $html);
        $this->assertStringContainsString('lenis@1.1.13/dist/lenis.min.js', $html);
        $this->assertStringContainsString('gsap/3.12.5/gsap.min.js', $html);
        $this->assertStringContainsString('ScrollTrigger.min.js', $html);
        $this->assertStringContainsString('cc-demo-player.js?v=dur1', $html);
        $this->assertStringContainsString('<footer class="ft is-revealed" id="footer">', $html);
        $this->assertStringContainsString('Authentic Indian sonic craft', $html);
        $this->assertStringNotContainsString('Trusted by composers worldwide', $html);
        $this->assertStringNotContainsString('pageHeadBeforeShared', $html);
        $this->assertStringNotContainsString("<<<'HTML'", $html);
        $this->assertStringNotContainsString('includes/bootstrap.php', $html);
        $this->assertSame(1, substr_count($html, '<main id="main"'));
        $this->assertSame(1, substr_count($html, 'id="cc-nav-mobile"'));
        $bookingModalPosition = strpos($html, 'id="bookingModal"');
        $footerPosition = strpos($html, '<footer class="ft is-revealed"');
        $bookingModalScriptPosition = strrpos($html, "const modal = document.getElementById('bookingModal');");

        $this->assertNotFalse($bookingModalPosition);
        $this->assertNotFalse($footerPosition);
        $this->assertNotFalse($bookingModalScriptPosition);
        $this->assertTrue(
            $footerPosition < $bookingModalPosition,
            'Shared footer should render before the booking modal markup.'
        );
        $this->assertTrue(
            $bookingModalPosition < $bookingModalScriptPosition,
            'Booking modal markup should render before the booking modal script initializes.'
        );
    }
}
