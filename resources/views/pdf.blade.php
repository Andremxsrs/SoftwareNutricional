<h1>Reporte de Monitoreo: {{ $reporte->nombre_reporte }}</h1>

<h2>1. Detalles de Formulación y Nutrición</h2>
<p>Este segmento del reporte detalla la composición nutricional utilizada en la formulación de las dietas para los peces, incluyendo un desglose de todos los ingredientes evaluados para asegurar el balance ideal.</p>

<strong>Formulación Nutricional:</strong>
<p>{{ $reporte->formulacion_nombre }}</p>

<strong>Descripción de la Formulación:</strong>
<p>{{ $reporte->formulacion_descripcion }}</p>

<strong>Ingredientes Evaluados:</strong>
<ul>
    {{ $reporte->ingredientes_evaluados ? $reporte->ingredientes_evaluados : 'No disponible' }}
</ul>

<h2>2. Detalles de Simulación de Crecimiento y Rendimiento</h2>
<p>Esta sección presenta los resultados previstos de crecimiento y rendimiento basados en la formulación aplicada, ofreciendo una perspectiva sobre la eficacia del régimen alimenticio.</p>

<strong>Crecimiento Predicho (%):</strong>
<p>{{ $reporte->crecimiento_predicho }}</p>

<strong>Rendimiento Predicho (%):</strong>
<p>{{ $reporte->rendimiento_predicho }}</p>

<h2>3. Resultados de Evaluaciones y Costos</h2>
<p>En esta parte, evaluamos si la formulación cumple con los estándares de calidad establecidos y proporcionamos un resumen de los costos asociados con la producción del alimento.</p>

<strong>Cumple con los Estándares:</strong>
<p>{{ $reporte->cumple_estandares ? 'Sí' : 'No' }}</p>

<strong>Resultado del Control:</strong>
<p>{{ $reporte->resultado_control }}</p>

<strong>Observaciones:</strong>
<p>{{ $reporte->observaciones }}</p>

<strong>Costo Total:</strong>
<p>${{ number_format($reporte->costo_total, 2) }}</p>

<strong>Sugerencias de Optimización:</strong>
<p>{{ $reporte->sugerencias_optimizacion }}</p>
