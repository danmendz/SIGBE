<?php

namespace App\Filament\Resources\PostulacionBecaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BitacoraPostulacionRelationManager extends RelationManager
{
    protected static string $relationship = 'bitacoras';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('usuario_reviso')
                    ->relationship('revisor', 'matricula') // Asegúrate de tener esta relación en el modelo
                    ->label('Usuario que revisó')
                    ->required(),

                DatePicker::make('actualizado_el')
                    ->label('Fecha de actualización')
                    ->required(),

                Select::make('accion')
                    ->options([
                        'revisado' => 'Revisado',
                        'aprobada' => 'Aprobada',
                        'rechazada' => 'Rechazada',
                    ])
                    ->default('revisado')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('accion')
            ->columns([
                TextColumn::make('usuario.name')
                    ->label('Revisado por'),

                TextColumn::make('actualizado_el')
                    ->label('Fecha de actualización')
                    ->sortable()
                    ->dateTime('d/m/Y H:i'),

                BadgeColumn::make('accion')
                    ->colors([
                        'revisado' => 'gray',
                        'aprobada' => 'success',
                        'rechazada' => 'danger',
                    ])
                    ->label('Acción')
                    ->formatStateUsing(fn (string $state) => ucfirst($state)),
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
