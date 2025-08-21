<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DatoSocioeconomicoResource\Pages;
use App\Filament\Resources\DatoSocioeconomicoResource\RelationManagers;
use App\Models\DatoSocioeconomico;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DatoSocioeconomicoResource extends Resource
{
    protected static ?string $model = DatoSocioeconomico::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    public static ?string $label = 'Datos socioeconómicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('matricula')->relationship('usuario', 'matricula'),
                TextInput::make('ingreso_mensual')->numeric()->required(),
                TextInput::make('tipo_vivienda')->required(),
                TextInput::make('dependiente')->required(),
                TextInput::make('ocupacion_dependiente')->required(),
                TextInput::make('dependientes_economicos')->numeric()->required(),
                Select::make('estado_civil')->options([
                    'soltero' => 'Soltero',
                    'casado' => 'Casado',
                ])->default('soltero'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('matricula'),
                TextColumn::make('ingreso_mensual')->money('MXN'),
                TextColumn::make('tipo_vivienda'),
                TextColumn::make('dependientes_economicos'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDatoSocioeconomicos::route('/'),
            'create' => Pages\CreateDatoSocioeconomico::route('/create'),
            'edit' => Pages\EditDatoSocioeconomico::route('/{record}/edit'),
        ];
    }
}
