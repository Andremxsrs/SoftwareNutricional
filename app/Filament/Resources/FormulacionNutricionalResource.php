<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormulacionNutricionalResource\Pages;
use App\Filament\Resources\FormulacionNutricionalResource\RelationManagers;
use App\Models\FormulacionNutricional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;

class FormulacionNutricionalResource extends Resource
{
    protected static ?string $model = FormulacionNutricional::class;

    protected static ?string $navigationLabel = 'Formulación Nutricional';

    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nombre')
            ->required()
            ->label('Nombre de la Formulación'),

        Textarea::make('descripcion')
            ->label('Descripción'),

        Repeater::make('evaluacionesIngredientes')
            ->relationship('evaluacionesIngredientes')
            ->schema([
                TextInput::make('nombre_ingrediente')
                    ->label('Nombre del Ingrediente')
                    ->required(),
                TextInput::make('calidad_nutricional')
                    ->label('Calidad Nutricional (en %)')
                    ->numeric()
                    ->required(),
                TextInput::make('cantidad')
                    ->label('Cantidad (mg)')
                    ->numeric()
                    ->required(),
            ])
            ->label('Ingredientes y Nutrientes')
            ->createItemButtonLabel('Agregar Ingrediente')
            ->collapsed(false), 
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre de la Formulación')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('descripcion')
                ->label('Descripción')
                ->sortable(),
                
            // Ejemplo de cómo agregar una columna que muestre datos de una relación. Si tienes campos relacionados que mostrar, asegúrate de que el nombre del atributo sea correcto.
            Tables\Columns\TextColumn::make('evaluacionesIngredientes.nombre_ingrediente')
                ->label('Ingrediente')
                ->sortable()
                ->searchable()
                ->visible(false),  // Puedes hacer esta columna visible por defecto o no según tus necesidades.
        ])
        ->filters([
            // Filtros si son necesarios
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
        return 'Formulación Nutricional';
    }

    public static function getPluralLabel(): string
    {
        return 'Formulación Nutricional';
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
            'index' => Pages\ListFormulacionNutricional::route('/'),
            'create' => Pages\CreateFormulacionNutricional::route('/create'),
            'edit' => Pages\EditFormulacionNutricional::route('/{record}/edit'),
        ];
    }
}
