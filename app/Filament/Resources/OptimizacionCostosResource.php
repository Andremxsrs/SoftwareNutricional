<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OptimizacionCostosResource\Pages;
use App\Filament\Resources\OptimizacionCostosResource\RelationManagers;
use App\Models\OptimizacionCostos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OptimizacionCostosResource extends Resource
{
    protected static ?string $model = OptimizacionCostos::class;

    protected static ?string $navigationLabel = 'Optimización de Costos';

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\BelongsToSelect::make('formulacion_id')
                ->label('Formulación Nutricional')
                ->relationship('formulacion', 'nombre')
                ->required(),

            Forms\Components\TextInput::make('costo_total')
                ->label('Costo Total ($)')
                ->numeric()
                ->required()
                ->hint('Costo total por tonelada de alimento formulado'), // Cambio de 'help' a 'hint'

            Forms\Components\Textarea::make('sugerencias')
                ->label('Sugerencias para Reducción de Costos')
                ->maxLength(65535)
                ->placeholder('Detalles sobre posibles sustituciones y optimizaciones')
                ->hint('Detalles adicionales que podrían ayudar en la optimización de costos') // Uso de 'hint' para proporcionar información adicional
                ->columnSpan(2)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('formulacion.nombre')
                ->label('Formulación Asociada')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('costo_total')
                ->label('Costo Total ($)')
                ->sortable(),

            Tables\Columns\TextColumn::make('sugerencias')
                ->label('Sugerencias')
                ->wrap(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Creado En')
                ->dateTime()  // Ajusta el formato de la fecha
                ->sortable(),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Actualizado En')
                ->dateTime()  // Ajusta el formato de la fecha
                ->sortable(),
        ])
        ->filters([
            // Filtros según sea necesario
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOptimizacionCostos::route('/'),
            'create' => Pages\CreateOptimizacionCostos::route('/create'),
            'edit' => Pages\EditOptimizacionCostos::route('/{record}/edit'),
        ];
    }
}
