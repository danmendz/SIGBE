<?php

namespace App\Filament\Resources\PostulacionBecaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequisitosVerificadosRelationManager extends RelationManager
{
    protected static string $relationship = 'requisitosVerificados';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('requisito_id')
                    ->relationship('requisito', 'id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->codigoRequisito->codigo)
                    ->label('Requisito')
                    ->required(),

                Toggle::make('cumplido')
                    ->label('Cumplido')
                    ->default(false)
                    ->required(),

                Textarea::make('observaciones')
                    ->label('Observaciones')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('requisito.tipoBeca.nombre')
            ->columns([
                TextColumn::make('requisito_id')
                    ->label('Requisito')
                    ->formatStateUsing(fn ($state, $record) => $record->requisito?->codigoRequisito?->codigo ?? 'Sin descripción'),

                IconColumn::make('cumplido')
                    ->boolean()
                    ->label('Cumplido'),

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
