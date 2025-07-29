<?php

namespace App\Filament\Resources\PublicacionBecaResource\Pages;

use App\Filament\Resources\PublicacionBecaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPublicacionBecas extends ListRecords
{
    protected static string $resource = PublicacionBecaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
