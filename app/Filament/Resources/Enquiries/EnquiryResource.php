<?php

namespace App\Filament\Resources\Enquiries;

use App\Filament\Resources\Enquiries\Pages\ListEnquiries;
use App\Filament\Resources\Enquiries\Pages\ViewEnquiry;
use App\Filament\Support\InboxResource;
use App\Models\Enquiry;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

/**
 * Read-only inbox for CC-ENQUIRY-HUB submissions (Contact Us form and the
 * recording-service enquiries), stored by EnquiryController.
 */
class EnquiryResource extends Resource
{
    protected static ?string $model = Enquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static string|\UnitEnum|null $navigationGroup = 'Queries';

    protected static ?string $navigationLabel = 'Contact Enquiries';

    protected static ?string $modelLabel = 'enquiry';

    protected static ?string $pluralModelLabel = 'contact enquiries';

    protected static ?int $navigationSort = 1;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Sender')->columns(2)->schema([
                TextEntry::make('name')->placeholder('—'),
                TextEntry::make('email')->copyable()->placeholder('—'),
                TextEntry::make('type')->badge()->formatStateUsing(fn (string $state): string => self::typeLabel($state)),
                TextEntry::make('programme')->placeholder('—'),
                TextEntry::make('submitted_at')->dateTime(),
                TextEntry::make('surface')->label('Submitted from')->placeholder('—'),
            ]),
            Section::make('Message / form data')->schema([
                KeyValueEntry::make('fields')->hiddenLabel()->columnSpanFull(),
            ]),
            Section::make('Technical')->collapsed()->columns(2)->schema([
                TextEntry::make('ip_address')->label('IP address')->placeholder('—'),
                TextEntry::make('user_agent')->placeholder('—'),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('submitted_at', 'desc')
            ->columns([
                InboxResource::unreadColumn(),
                TextColumn::make('submitted_at')->label('Received')->dateTime()->sortable(),
                TextColumn::make('name')->searchable()->weight(fn ($record) => $record->isUnread() ? 'bold' : 'normal')->placeholder('—'),
                TextColumn::make('email')->searchable()->copyable()->placeholder('—'),
                TextColumn::make('type')->badge()->formatStateUsing(fn (string $state): string => self::typeLabel($state)),
                TextColumn::make('fields.message')->label('Message')->limit(60)->placeholder('—'),
            ])
            ->filters([
                InboxResource::unreadFilter(),
                SelectFilter::make('type')->options([
                    'general' => 'Contact',
                    'recording' => 'Recording',
                    'collaborator' => 'Collaborator',
                ]),
            ])
            ->recordActions([ViewAction::make(), InboxResource::toggleRecordAction(), DeleteAction::make()])
            ->toolbarActions([BulkActionGroup::make([...InboxResource::bulkActions(), DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEnquiries::route('/'),
            'view' => ViewEnquiry::route('/{record}'),
        ];
    }

    private static function typeLabel(string $type): string
    {
        return ['general' => 'Contact', 'recording' => 'Recording', 'collaborator' => 'Collaborator'][$type] ?? $type;
    }
}
