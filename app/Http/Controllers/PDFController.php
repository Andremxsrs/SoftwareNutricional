<?php

namespace App\Http\Controllers;

use App\Models\ReportesMonitoreo;
use PDF; // Importamos el facade de dompdf
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function downloadPDF($id)
    {
        // Encuentra el reporte por su ID
        $reporte = ReportesMonitoreo::findOrFail($id);

        // Carga la vista 'pdf' y pasa el reporte como variable
        $pdf = PDF::loadView('pdf', compact('reporte'));

        // Retorna el PDF descargable
        return $pdf->download('reporte_monitoreo_' . $reporte->id . '.pdf');
    }
}


