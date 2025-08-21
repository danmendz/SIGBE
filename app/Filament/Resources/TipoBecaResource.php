<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoBecaResource\Pages;
use App\Filament\Resources\TipoBecaResource\RelationManagers;
use App\Filament\Resources\TipoBecaResource\RelationManagers\RequisitoBecaRelationManager;
use App\Models\TipoBeca;
use Filament\Forms;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoBecaResource extends Resource
{
    protected static ?string $model = TipoBeca::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    public static ?string $label = 'Tipo de becas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')->required(),
                Textarea::make('descripcion'),
                TextInput::make('porcentaje_descuento')->numeric()->step(0.01),
                MultiSelect::make('requisitos')
                    ->label('Requisitos')
                    ->relationship('requisitos', 'codigo')
                    ->preload()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre'),
                TextColumn::make('porcentaje_descuento')->suffix('%'),
                TextColumn::make('descripcion')->limit(50),
                BadgeColumn::make('requisitos.codigo')->label('Requisitos')->colors(['primary']),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            RequisitoBecaRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTipoBecas::route('/'),
            'create' => Pages\CreateTipoBeca::route('/create'),
            'edit' => Pages\EditTipoBeca::route('/{record}/edit'),
        ];
    }
}
