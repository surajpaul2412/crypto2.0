<?php

namespace App\Filament\Resources\HeritageCategories\Pages;

use App\Filament\Resources\HeritageCategories\HeritageCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHeritageCategory extends EditRecord
{
    protected static string $resource = HeritageCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
