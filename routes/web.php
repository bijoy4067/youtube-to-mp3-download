<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YoutubeConverterController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/convert', [YoutubeConverterController::class, 'convert'])->name('convert');
