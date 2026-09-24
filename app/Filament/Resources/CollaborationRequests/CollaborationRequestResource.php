<?php

namespace App\Filament\Resources\CollaborationRequests;

use App\Filament\Resources\CollaborationRequests\Pages\ListCollaborationRequests;
use App\Filament\Resources\CollaborationRequests\Pages\ViewCollaborationRequest;
use App\Filament\Support\InboxResource;
use App\Models\CollaborationRequest;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

/**
 * Read-only inbox for Collaboration page applications, stored by
 * CollaborationRequestController.
 */
class CollaborationRequestResource extends Resource
{
    protected static ?string $model = CollaborationRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static string|\UnitEnum|null $navigationGroup = 'Queries';

    protected static ?string $navigationLabel = 'Collaboration Requests';

    protected static ?int $navigationSort = 2;

    public const PROGRAMMES = [
        'artists' => 'Artists',
        'composers' => 'Composers',
        'sound' => 'Sound Designers',
        'content' => 'Content Creators',
        'producers' => 'Producers',
        'ksp' => 'Kontakt Script Programmers',
        'web' => 'Web / Platform',
        'designers' => 'UI / Graphic',
        'affiliates' => 'Affiliates',
    ];

    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Applicant')->columns(2)->schema([
                TextEntry::make('name'),
                TextEntry::make('based')->label('Based in')->placeholder('—'),
                TextEntry::make('programme')->badge()->formatStateUsing(fn (string $state): string => self::PROGRAMMES[$state] ?? $state),
                TextEntry::make('submitted_at')->dateTime(),
                TextEntry::make('surface')->label('Submitted from')->placeholder('—'),
                IconEntry::make('consent')->boolean(),
            ]),
            Section::make('Application')->schema([
                TextEntry::make('links')->listWithLineBreaks()->bulleted()->placeholder('—'),
                TextEntry::make('why')->label('Why this interests them')->placeholder('—')->columnSpanFull(),
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
                TextColumn::make('name')->searchable()->weight(fn ($record) => $record->isUnread() ? 'bold' : 'normal'),
                TextColumn::make('programme')->badge()->formatStateUsing(fn (string $state): string => self::PROGRAMMES[$state] ?? $state),
                TextColumn::make('based')->searchable()->placeholder('—'),
                TextColumn::make('why')->limit(60)->placeholder('—'),
            ])
            ->filters([
                InboxResource::unreadFilter(),
                SelectFilter::make('programme')->options(self::PROGRAMMES),
            ])
            ->recordActions([ViewAction::make(), InboxResource::toggleRecordAction(), DeleteAction::make()])
            ->toolbarActions([BulkActionGroup::make([...InboxResource::bulkActions(), DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCollaborationRequests::route('/'),
            'view' => ViewCollaborationRequest::route('/{record}'),
        ];
    }
}
