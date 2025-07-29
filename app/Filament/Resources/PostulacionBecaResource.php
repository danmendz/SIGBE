<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostulacionBecaResource\Pages;
use App\Filament\Resources\PostulacionBecaResource\RelationManagers;
use App\Filament\Resources\PostulacionBecaResource\RelationManagers\BitacoraPostulacionRelationManager;
use App\Filament\Resources\PostulacionBecaResource\RelationManagers\ComprobanteIngresoRelationManager;
use App\Filament\Resources\PostulacionBecaResource\RelationManagers\RequisitosVerificadosRelationManager;
use App\Models\PostulacionBeca;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostulacionBecaResource extends Resource
{
    protected static ?string $model = PostulacionBeca::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('beca_publicada_id')->relationship('publicacionBeca', 'id'),
                Forms\Components\Select::make('estudiante_id')
                    ->label('Estudiante')
                    ->relationship('usuario', 'matricula')
                    ->required(),   
                DatePicker::make('fecha_postulacion')->required(),
                Select::make('estatus')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'aprobada' => 'Aprobada',
                        'rechazada' => 'Rechazada',
                    ])->default('pendiente'),
                Textarea::make('motivo_rechazo')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('usuario.matricula')->label('Estudiante'),
                TextColumn::make('publicacionBeca.periodo.nombre_periodo'),
                TextColumn::make('fecha_postulacion')->date(),
                TextColumn::make('estatus'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            BitacoraPostulacionRelationManager::class,
            ComprobanteIngresoRelationManager::class,
            RequisitosVerificadosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPostulacionBecas::route('/'),
            'create' => Pages\CreatePostulacionBeca::route('/create'),
            'edit' => Pages\EditPostulacionBeca::route('/{record}/edit'),
        ];
    }
}
