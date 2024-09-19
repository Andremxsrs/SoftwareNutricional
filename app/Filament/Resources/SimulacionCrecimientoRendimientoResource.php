<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SimulacionCrecimientoRendimientoResource\Pages;
use App\Filament\Resources\SimulacionCrecimientoRendimientoResource\RelationManagers;
use App\Models\SimulacionCrecimientoRendimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SimulacionCrecimientoRendimientoResource extends Resource
{
    protected static ?string $model = SimulacionCrecimientoRendimiento::class;

    protected static ?string $navigationLabel = 'Simulación de Crecimiento y Renidmiento';

    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nombre_simulacion')
                ->label('Nombre de la Simulación')
                ->required(),
                Forms\Components\BelongsToSelect::make('formulacion_id')
                ->label('Formulación Nutricional')
                ->relationship('formulacion', 'nombre')  // Asumiendo que 'nombre' es el campo descriptivo de la formulación.
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('crecimiento_predicho')
                ->label('Crecimiento Predicho (%)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('rendimiento_predicho')
                ->label('Rendimiento Predicho (%)')
                ->numeric()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nombre_simulacion')
                ->label('Nombre Formulación')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('crecimiento_predicho')
                ->label('Crecimiento Predicho (%)')
                ->sortable(),

            Tables\Columns\TextColumn::make('rendimiento_predicho')
                ->label('Rendimiento Predicho (%)')
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Creado')
                ->dateTime()  // Formato de fecha correcto
                ->sortable()
                ->toggleable(true),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Actualizado')
                ->dateTime()  // Formato de fecha correcto
                ->sortable()
                ->toggleable(true),
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
        return 'Simulación de Crecimiento y Rendimiento';
    }

    public static function getPluralLabel(): string
    {
        return 'Simulación de Crecimiento y Rendimiento';
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
            'index' => Pages\ListSimulacionCrecimientoRendimientos::route('/'),
            'create' => Pages\CreateSimulacionCrecimientoRendimiento::route('/create'),
            'edit' => Pages\EditSimulacionCrecimientoRendimiento::route('/{record}/edit'),
        ];
    }
}
