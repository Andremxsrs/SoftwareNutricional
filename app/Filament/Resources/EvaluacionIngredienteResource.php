<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EvaluacionIngredienteResource\Pages;
use App\Filament\Resources\EvaluacionIngredienteResource\RelationManagers;
use App\Models\EvaluacionIngrediente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EvaluacionIngredienteResource extends Resource
{
    protected static ?string $model = EvaluacionIngrediente::class;

    protected static ?string $navigationLabel = 'Evaluación de Ingredientes';

    protected static ?string $navigationIcon = 'heroicon-o-scale';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nombre_ingrediente')
                ->label('Nombre del Ingrediente')
                ->required(),

            Forms\Components\TextInput::make('calidad_nutricional')
                ->label('Calidad Nutricional (%)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('cantidad')
                ->label('Cantidad (mg)')
                ->numeric()
                ->required(),

            Forms\Components\Select::make('formulacion_id')
                ->label('Formulación')
                ->relationship('formulacion', 'nombre')  // Asume que 'nombre' es el campo deseado para mostrar de la formulación.
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_ingrediente')
                ->label('Nombre del Ingrediente')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('calidad_nutricional')
                ->label('Calidad Nutricional (%)')
                ->sortable(),

            Tables\Columns\TextColumn::make('cantidad')
                ->label('Cantidad (mg)')
                ->sortable(),

            Tables\Columns\TextColumn::make('formulacion.nombre')
                ->label('Formulación Asociada')
                ->sortable()
                ->searchable(),
        ])
        ->filters([
            // Agrega filtros si es necesario
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getLabel(): string
    {
        return 'Evaluación de Ingredientes';
    }

    public static function getPluralLabel(): string
    {
        return 'Evaluación de Ingredientes';
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
            'index' => Pages\ListEvaluacionIngredientes::route('/'),
            'create' => Pages\CreateEvaluacionIngrediente::route('/create'),
            'edit' => Pages\EditEvaluacionIngrediente::route('/{record}/edit'),
        ];
    }
}
