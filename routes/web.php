<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/download-pdf/{id}', [PDFController::class, 'downloadPDF'])->name('download.pdf');