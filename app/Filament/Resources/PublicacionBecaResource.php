<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicacionBecaResource\Pages;
use App\Filament\Resources\PublicacionBecaResource\RelationManagers;
use App\Models\PublicacionBeca;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PublicacionBecaResource extends Resource
{
    protected static ?string $model = PublicacionBeca::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    public static ?string $label = 'Publicación de becas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tipo_beca_id')->relationship('tipoBeca', 'nombre'),
                Select::make('periodo_id')
                    ->label('Periodo')
                    ->options(
                        \App\Models\Periodo::all()->pluck('nombre_periodo', 'id')
                    )
                    ->searchable()
                    ->required(),
                DatePicker::make('fecha_inicio')->required(),
                DatePicker::make('fecha_fin')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tipoBeca.nombre')->label('Tipo de Beca'),
                TextColumn::make('tipoBeca.descripcion')->label('Descripción'),
                TextColumn::make('tipoBeca.porcentaje_descuento')->label('Descuento (%)'),
                BadgeColumn::make('tipoBeca.requisitos')
                    ->label('Requisitos')
                    ->getStateUsing(function ($record) {
                        return $record->tipoBeca?->requisitos?->pluck('codigo')?->toArray() ?? [];
                    })
                    ->colors([
                        'primary',
                    ])
                    ->limit(2)
                    ->extraAttributes(['class' => 'text-xs font-medium']),

                TextColumn::make('periodo.nombre_periodo'),
                TextColumn::make('fecha_inicio')->date(),
                TextColumn::make('fecha_fin')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPublicacionBecas::route('/'),
            'create' => Pages\CreatePublicacionBeca::route('/create'),
            'edit' => Pages\EditPublicacionBeca::route('/{record}/edit'),
        ];
    }
}
