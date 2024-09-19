<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportesMonitoreoResource\Pages;
use App\Models\ReportesMonitoreo;
use App\Models\SimulacionCrecimientoRendimiento;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;

class ReportesMonitoreoResource extends Resource
{
    protected static ?string $model = ReportesMonitoreo::class;
    protected static ?string $navigationLabel = 'Reportes y Monitoreo';
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Card::make()->schema([
                Forms\Components\TextInput::make('nombre_reporte')
                    ->label('Nombre del Reporte')
                    ->required()
                    ->placeholder('Ingresa el nombre del reporte'),

                Forms\Components\Select::make('simulacion_id')
                    ->label('Crecimiento y Rendimiento')
                    ->relationship('simulacion', 'nombre_simulacion')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set, $state) => static::loadSimulationData($set, $state)),
            ]),

            Section::make('Detalles de Formulación y Nutrición')->schema([
                Forms\Components\TextInput::make('formulacion_nombre')
                    ->label('Formulación Nutricional')
                    ->readOnly(),

                Forms\Components\TextArea::make('formulacion_descripcion')
                    ->label('Descripción de la Formulación')
                    ->readOnly(),
            ]),

            Section::make('Ingredientes Evaluados')->schema([
                Forms\Components\Textarea::make('ingredientes_evaluados')
                    ->label('Ingredientes Evaluados')
                    ->readOnly()
                    ->default(function ($record) {
                        if ($record && $record->ingredientes_evaluados) {
                            $ingredientes = json_decode($record->ingredientes_evaluados, true);
                            if (is_array($ingredientes)) {
                                // Formatear los ingredientes de forma legible
                                $output = '';
                                foreach ($ingredientes as $ingrediente) {
                                    $output .= "Ingrediente: {$ingrediente['nombre_ingrediente']}, Calidad: {$ingrediente['calidad_nutricional']}%, Cantidad: {$ingrediente['cantidad']} mg\n";
                                }
                                return $output;
                            }
                        }
                        return 'No se han evaluado ingredientes';
                    })
                    ->rows(5),  // Ajusta el tamaño del campo según sea necesario
            ]),
            
            Section::make('Detalles de Simulación de Crecimiento y Rendimiento')->schema([
                Forms\Components\TextInput::make('crecimiento_predicho')
                    ->label('Crecimiento Predicho (%)')
                    ->readOnly(),

                Forms\Components\TextInput::make('rendimiento_predicho')
                    ->label('Rendimiento Predicho (%)')
                    ->readOnly(),
            ]),

            Section::make('Resultados de Evaluaciones y Costos')->schema([
                Forms\Components\Toggle::make('cumple_estandares')
                    ->label('Cumple con los Estándares')
                    ->onColor('success') // Si deseas mostrar que el valor es verdadero
                    ->offColor('danger') // Si es falso
                    ->default(false), // El valor por defecto es false (0)

                Forms\Components\TextInput::make('resultado_control')
                    ->label('Resultado del Control')
                    ->readOnly(),

                Forms\Components\TextArea::make('observaciones')
                    ->label('Observaciones')
                    ->readOnly(),

                Forms\Components\TextInput::make('costo_total')
                    ->label('Costo Total ($)')
                    ->readOnly(),

                Forms\Components\TextArea::make('sugerencias_optimizacion')
                    ->label('Sugerencias de Optimización')
                    ->readOnly(),
            ]),
        ]);
    }

    // Método para cargar los datos de simulación
    protected static function loadSimulationData(callable $set, $state)
    {
        $simulacion = SimulacionCrecimientoRendimiento::with([
            'formulacion.evaluacionesIngredientes',
            'formulacion.controlesCalidad',
            'formulacion.optimizacionCostos',
        ])->find($state);

        if ($simulacion) {
            $set('crecimiento_predicho', $simulacion->crecimiento_predicho);
            $set('rendimiento_predicho', $simulacion->rendimiento_predicho);
            $set('formulacion_nombre', $simulacion->formulacion->nombre);
            $set('formulacion_descripcion', $simulacion->formulacion->descripcion);

            // Procesar ingredientes sin campos innecesarios
            $ingredientesFormateados = $simulacion->formulacion->evaluacionesIngredientes->map(function ($ingrediente) {
                return "Ingrediente: {$ingrediente->nombre_ingrediente}, Calidad: {$ingrediente->calidad_nutricional}%, Cantidad: {$ingrediente->cantidad} mg";
            })->implode("\n");

            $set('ingredientes_evaluados', $ingredientesFormateados);

            if ($control = $simulacion->formulacion->controlesCalidad->first()) {
                $set('resultado_control', $control->resultado_control);
                $set('cumple_estandares', $control->cumple_estandares);
                $set('observaciones', $control->observaciones);
            }

            if ($costo = $simulacion->formulacion->optimizacionCostos) {
                $set('costo_total', $costo->costo_total);
                $set('sugerencias_optimizacion', $costo->sugerencias);
            }
        }
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_reporte')
                    ->label('Nombre del Reporte')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('simulacion.nombre_simulacion')
                    ->label('Simulación de Crecimiento y Rendimiento')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getLabel(): string
    {
        return 'Reporte de Monitoreo';
    }

    public static function getPluralLabel(): string
    {
        return 'Reportes de Monitoreo';
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReportesMonitoreos::route('/'),
            'create' => Pages\CreateReportesMonitoreo::route('/create'),
            'edit' => Pages\EditReportesMonitoreo::route('/{record}/edit'),
        ];
    }
}
