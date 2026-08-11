<?php

namespace App\Filament\Resources\ProductMoods\Pages;

use App\Filament\Resources\ProductMoods\ProductMoodResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductMood extends CreateRecord
{
    protected static string $resource = ProductMoodResource::class;
}
