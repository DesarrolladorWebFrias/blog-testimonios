<?php

namespace App\Filament\Resources\Pages\Pages;

use App\PostType;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Pages\PageResource;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

     protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = PostType::PAGE;
        $data['author_id'] = auth()->id();
        return $data;
    }
}
