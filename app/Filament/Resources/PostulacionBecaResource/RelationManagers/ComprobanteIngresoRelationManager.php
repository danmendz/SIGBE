<?php

namespace App\Filament\Resources\PostulacionBecaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComprobanteIngresoRelationManager extends RelationManager
{
    protected static string $relationship = 'comprobantesIngresos';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('tipo_documento')
                    ->label('Tipo de documento')
                    ->maxLength(100)
                    ->required(),

                TextInput::make('emisor')
                    ->label('Emisor del documento')
                    ->maxLength(100),

                DatePicker::make('fecha_emision')
                    ->label('Fecha de emisión'),

                Textarea::make('observaciones')
                    ->label('Observaciones')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('tipo_documento')
            ->columns([
                TextColumn::make('tipo_documento')
                    ->label('Tipo de documento'),

                TextColumn::make('emisor')
                    ->label('Emisor'),

                TextColumn::make('fecha_emision')
                    ->label('Fecha de emisión')
                    ->sortable()
                    ->dateTime('d/m/Y H:i'),

                TextColumn::make('observaciones')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->observaciones)
                    ->label('Observaciones'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
