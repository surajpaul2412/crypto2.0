<?php

namespace App\Filament\Resources\ProductUsecases\Pages;

use App\Filament\Resources\ProductUsecases\ProductUsecaseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProductUsecase extends EditRecord
{
    protected static string $resource = ProductUsecaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
