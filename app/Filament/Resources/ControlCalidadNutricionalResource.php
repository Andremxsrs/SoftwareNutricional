<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ControlCalidadNutricionalResource\Pages;
use App\Filament\Resources\ControlCalidadNutricionalResource\RelationManagers;
use App\Models\ControlCalidadNutricional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ControlCalidadNutricionalResource extends Resource
{
    protected static ?string $model = ControlCalidadNutricional::class;

    protected static ?string $navigationLabel = 'Control de Calida Nutricional';

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\BelongsToSelect::make('formulacion_id')
                ->label('Formulación Nutricional')
                ->relationship('formulacion', 'nombre')
                ->required(),

            Forms\Components\TextInput::make('resultado_control')
                ->label('Resultado del Control')
                ->required(),

            Forms\Components\Toggle::make('cumple_estandares')
                ->label('Cumple con los Estándares')
                ->required(),
                
            Forms\Components\Textarea::make('observaciones')
                ->label('Observaciones'),
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

            Tables\Columns\TextColumn::make('resultado_control')
                ->label('Resultado del Control'),

            Tables\Columns\BooleanColumn::make('cumple_estandares')
                ->label('Cumple Estándares')
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Fecha de Control')
                ->dateTime()
                ->sortable(),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Última Actualización')
                ->dateTime()
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

    public static function getLabel(): string
    {
        return 'Control de Calidad Nutricional';
    }

    public static function getPluralLabel(): string
    {
        return 'Control de Calidad Nutricional';
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
            'index' => Pages\ListControlCalidadNutricional::route('/'),
            'create' => Pages\CreateControlCalidadNutricional::route('/create'),
            'edit' => Pages\EditControlCalidadNutricional::route('/{record}/edit'),
        ];
    }
}
