<?php

namespace App\Filament\Resources\CodigoRequisitoResource\Pages;

use App\Filament\Resources\CodigoRequisitoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCodigoRequisito extends EditRecord
{
    protected static string $resource = CodigoRequisitoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
