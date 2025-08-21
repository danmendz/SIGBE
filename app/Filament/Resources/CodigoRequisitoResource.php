<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CodigoRequisitoResource\Pages;
use App\Filament\Resources\CodigoRequisitoResource\RelationManagers;
use App\Models\CodigoRequisito;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CodigoRequisitoResource extends Resource
{
    protected static ?string $model = CodigoRequisito::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    public static ?string $label = 'Códigos de requisitos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([ 
                TextInput::make('codigo')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('descripcion')->required(),
                Select::make('tipo_validacion')
                    ->options([
                        'automatica' => 'Automática',
                        'manual' => 'Manual',
                        'mixta' => 'Mixta',
                    ])
                    ->default('automatica')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('codigo'),
                TextColumn::make('descripcion'),

                TextColumn::make('tipo_validacion')
                    ->badge()
                    ->colors([
                        'info' => 'automatica',
                        'warning' => 'manual',
                        'warning' => 'mixta',
                    ]),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCodigoRequisitos::route('/'),
            'create' => Pages\CreateCodigoRequisito::route('/create'),
            'edit' => Pages\EditCodigoRequisito::route('/{record}/edit'),
        ];
    }
}
