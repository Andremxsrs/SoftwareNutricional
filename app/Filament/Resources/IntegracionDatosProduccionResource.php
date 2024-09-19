<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IntegracionDatosProduccionResource\Pages;
use App\Filament\Resources\IntegracionDatosProduccionResource\RelationManagers;
use App\Models\IntegracionDatosProduccion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;



class IntegracionDatosProduccionResource extends Resource
{
    protected static ?string $model = IntegracionDatosProduccion::class;

    protected static ?string $navigationLabel = 'Datos de Producción';

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            //
        ];
    }

    public static function getLabel(): string
    {
        return 'Datos Producción';
    }

    public static function getPluralLabel(): string
    {
        return 'Datos Producción';
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIntegracionDatosProduccions::route('/'),
            'create' => Pages\CreateIntegracionDatosProduccion::route('/create'),
            'edit' => Pages\EditIntegracionDatosProduccion::route('/{record}/edit'),
        ];
    }
}
