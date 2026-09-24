<?php

namespace Tests\Feature;

use App\Filament\Support\InboxResource;
use App\Models\CollaborationRequest;
use App\Models\Enquiry;
use App\Models\User;
use Livewire\Livewire;
use App\Filament\Resources\CollaborationRequests\Pages\ListCollaborationRequests;
use App\Filament\Resources\Enquiries\Pages\ListEnquiries;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InboxReadStatusTest extends TestCase
{
    use RefreshDatabase;

    private function makeCollab(): CollaborationRequest
    {
        return CollaborationRequest::create([
            'programme' => 'artists', 'name' => 'Tester', 'links' => [], 'fields' => [], 'submitted_at' => now(),
        ]);
    }

    public function test_new_submissions_are_unread_and_can_be_marked_read(): void
    {
        $collab = $this->makeCollab();

        $this->assertTrue($collab->isUnread());
        $this->assertSame(1, CollaborationRequest::unread()->count());

        $collab->markAsRead();

        $this->assertFalse($collab->fresh()->isUnread());
        $this->assertSame(0, CollaborationRequest::unread()->count());
    }

    public function test_sidebar_dot_css_only_exists_while_something_is_unread(): void
    {
        $this->assertSame('', InboxResource::dotCss());

        $collab = $this->makeCollab();
        $enquiry = Enquiry::create(['type' => 'general', 'name' => 'A', 'fields' => [], 'submitted_at' => now()]);

        $css = InboxResource::dotCss();
        $this->assertStringContainsString('/admin/collaboration-requests', $css);
        $this->assertStringContainsString('/admin/enquiries', $css);

        $collab->markAsRead();
        $css = InboxResource::dotCss();
        $this->assertStringNotContainsString('/admin/collaboration-requests', $css);
        $this->assertStringContainsString('/admin/enquiries', $css);

        $enquiry->markAsRead();
        $this->assertSame('', InboxResource::dotCss());
    }

    public function test_admin_pages_render_dot_and_viewing_marks_read(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']));
        $collab = $this->makeCollab();

        $this->get('/admin/collaboration-requests')
            ->assertOk()
            ->assertSee('cc-inbox-dots', false)
            ->assertSee('/admin/collaboration-requests"]', false);

        $this->get('/admin/collaboration-requests/'.$collab->id)->assertOk();

        $this->assertFalse($collab->fresh()->isUnread());
    }

    public function test_toggle_action_flips_state_and_pushes_fresh_dot_css_to_the_sidebar(): void
    {
        \Filament\Facades\Filament::setCurrentPanel('admin');
        $this->actingAs(User::factory()->create(['role' => 'admin']));
        $collab = $this->makeCollab();

        Livewire::test(ListCollaborationRequests::class)
            ->callTableAction('toggleRead', $collab)
            ->assertDispatched('inbox-dots', css: '');
        $this->assertNotNull($collab->fresh()->read_at);

        Livewire::test(ListCollaborationRequests::class)
            ->callTableAction('toggleRead', $collab)
            ->assertDispatched('inbox-dots', css: InboxResource::dotCss());
        $this->assertNull($collab->fresh()->read_at);
        $this->assertStringContainsString('border-radius', InboxResource::dotCss());
    }

    public function test_bulk_actions_mark_read_and_unread(): void
    {
        \Filament\Facades\Filament::setCurrentPanel('admin');
        $this->actingAs(User::factory()->create(['role' => 'admin']));
        $enquiry = Enquiry::create(['type' => 'general', 'name' => 'A', 'fields' => [], 'submitted_at' => now()]);

        Livewire::test(ListEnquiries::class)->callTableBulkAction('markRead', [$enquiry]);
        $this->assertNotNull($enquiry->fresh()->read_at);

        Livewire::test(ListEnquiries::class)->callTableBulkAction('markUnread', [$enquiry]);
        $this->assertNull($enquiry->fresh()->read_at);
    }
}
