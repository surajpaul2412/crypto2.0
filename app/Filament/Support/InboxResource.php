<?php

namespace App\Filament\Support;

use App\Filament\Resources\CollaborationRequests\CollaborationRequestResource;
use App\Filament\Resources\Enquiries\EnquiryResource;
use App\Models\CollaborationRequest;
use App\Models\Enquiry;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Filament\Actions\BulkAction;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Shared read/unread table pieces for the "Queries" inbox resources.
 */
class InboxResource
{
    public static function unreadColumn(): TextColumn
    {
        return TextColumn::make('read_at')
            ->label('')
            ->state(fn (Model $record): string => $record->isUnread() ? '●' : '')
            ->color('success')
            ->tooltip(fn (Model $record): ?string => $record->isUnread() ? 'Unread' : null);
    }

    public static function unreadFilter(): TernaryFilter
    {
        return TernaryFilter::make('unread')
            ->label('Status')
            ->placeholder('All')
            ->trueLabel('Unread only')
            ->falseLabel('Read only')
            ->queries(
                true: fn ($query) => $query->whereNull('read_at'),
                false: fn ($query) => $query->whereNotNull('read_at'),
                blank: fn ($query) => $query,
            );
    }

    public static function toggleRecordAction(): Action
    {
        return Action::make('toggleRead')
            ->label(fn (Model $record): string => $record->isUnread() ? 'Mark as read' : 'Mark as unread')
            ->icon(fn (Model $record): string => $record->isUnread() ? 'heroicon-o-envelope-open' : 'heroicon-o-envelope')
            ->action(function (Model $record, Component $livewire) {
                $record->update(['read_at' => $record->isUnread() ? now() : null]);
                self::refreshDots($livewire);
            });
    }

    /** @return array<BulkAction> */
    public static function bulkActions(): array
    {
        return [
            BulkAction::make('markRead')
                ->label('Mark as read')
                ->icon('heroicon-o-envelope-open')
                ->action(function (Collection $records, Component $livewire) {
                    $records->each->update(['read_at' => now()]);
                    self::refreshDots($livewire);
                })
                ->deselectRecordsAfterCompletion(),
            BulkAction::make('markUnread')
                ->label('Mark as unread')
                ->icon('heroicon-o-envelope')
                ->action(function (Collection $records, Component $livewire) {
                    $records->each->update(['read_at' => null]);
                    self::refreshDots($livewire);
                })
                ->deselectRecordsAfterCompletion(),
        ];
    }

    /**
     * Green dot on the left of each "Queries" sidebar item (and its group
     * heading) while that inbox still has unread submissions.
     */
    public static function dotCss(): string
    {
        $inboxes = [
            EnquiryResource::class => Enquiry::class,
            CollaborationRequestResource::class => CollaborationRequest::class,
        ];

        $css = '';

        foreach ($inboxes as $resource => $model) {
            if (! $model::unread()->exists()) {
                continue;
            }

            $path = '/admin/'.$resource::getSlug();

            $css .= <<<CSS
            .fi-sidebar-group:has(.fi-sidebar-item-btn[href\$="{$path}"]) > .fi-sidebar-group-btn { position: relative; }
            .fi-sidebar-item-btn[href\$="{$path}"]::before,
            .fi-sidebar-group:has(.fi-sidebar-item-btn[href\$="{$path}"]) > .fi-sidebar-group-btn::before {
                content: ''; position: absolute; left: 0.2rem; top: 50%; transform: translateY(-50%);
                width: 0.5rem; height: 0.5rem; border-radius: 9999px; background: #22c55e;
                box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.25);
            }

            CSS;
        }

        return $css;
    }

    /** Render hook output: the dot <style> plus a listener that swaps it live after read/unread actions. */
    public static function dotAssets(): HtmlString
    {
        $css = self::dotCss();

        return new HtmlString(
            '<style id="cc-inbox-dots">'.$css.'</style>'.
            '<script>window.addEventListener("inbox-dots",function(e){var d=e.detail||{};'.
            'if(Array.isArray(d))d=d[0]||{};var s=document.getElementById("cc-inbox-dots");'.
            'if(s)s.textContent=d.css||"";});</script>'
        );
    }

    private static function refreshDots(Component $livewire): void
    {
        $livewire->dispatch('inbox-dots', css: self::dotCss());
    }
}
