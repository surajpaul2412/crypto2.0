<?php

namespace App\Filament\Resources\ProductMoods\Pages;

use App\Filament\Resources\ProductMoods\ProductMoodResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProductMood extends EditRecord
{
    protected static string $resource = ProductMoodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
