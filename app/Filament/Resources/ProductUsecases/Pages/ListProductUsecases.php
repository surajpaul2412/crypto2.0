<?php

namespace App\Filament\Resources\ProductUsecases\Pages;

use App\Filament\Resources\ProductUsecases\ProductUsecaseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductUsecases extends ListRecords
{
    protected static string $resource = ProductUsecaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
