<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BecaActivaResource\Pages;
use App\Filament\Resources\BecaActivaResource\RelationManagers;
use App\Models\BecaActiva;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BecaActivaResource extends Resource
{
    protected static ?string $model = BecaActiva::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('estudiante_id')
                    ->relationship('usuario', 'matricula')
                    ->searchable()
                    ->required(),

                Select::make('tipo_beca_id')
                    ->relationship('tipoBeca', 'nombre')
                    ->searchable()
                    ->required(),
                
                Select::make('periodo_beca')
                    ->label('Periodo')
                    ->options(
                        \App\Models\Periodo::all()->pluck('nombre_periodo', 'id')
                    )
                    ->searchable()
                    ->required(),

                DatePicker::make('fecha_solicitud')->required(),
                DatePicker::make('fecha_autorizacion'),
                DatePicker::make('fecha_terminacion'),
                DatePicker::make('fecha_baja'),

                Forms\Components\Textarea::make('motivo_baja'),

                Toggle::make('activa')->label('¿Activa?')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('usuario.matricula')->label('Estudiante'),
                TextColumn::make('tipoBeca.nombre')->label('Tipo de Beca'),
                TextColumn::make('periodo_beca'),
                TextColumn::make('fecha_solicitud')->date(),
                TextColumn::make('fecha_autorizacion')->date(),
                TextColumn::make('fecha_terminacion')->date(),
                IconColumn::make('activo')->boolean(),
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
            'index' => Pages\ListBecaActivas::route('/'),
            'create' => Pages\CreateBecaActiva::route('/create'),
            'edit' => Pages\EditBecaActiva::route('/{record}/edit'),
        ];
    }
}
