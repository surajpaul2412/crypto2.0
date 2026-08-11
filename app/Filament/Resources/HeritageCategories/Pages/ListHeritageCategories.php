<?php

namespace App\Filament\Resources\HeritageCategories\Pages;

use App\Filament\Resources\HeritageCategories\HeritageCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHeritageCategories extends ListRecords
{
    protected static string $resource = HeritageCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
