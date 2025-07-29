<?php

namespace App\Filament\Resources\PostulacionBecaResource\Pages;

use App\Filament\Resources\PostulacionBecaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostulacionBecas extends ListRecords
{
    protected static string $resource = PostulacionBecaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
