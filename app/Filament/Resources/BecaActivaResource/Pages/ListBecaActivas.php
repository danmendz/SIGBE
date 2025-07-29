<?php

namespace App\Filament\Resources\BecaActivaResource\Pages;

use App\Filament\Resources\BecaActivaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBecaActivas extends ListRecords
{
    protected static string $resource = BecaActivaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
