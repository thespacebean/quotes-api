<?php

use App\Http\Controllers\Api\QuoteController;
use Illuminate\Support\Facades\Route;


Route::controller(QuoteController::class)->prefix('quotes')->group(function () {
    Route::get('/', 'index');
    Route::get('/random', 'random');
});
