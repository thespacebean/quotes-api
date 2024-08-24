<?php

use Illuminate\Support\Facades\Route;

Route::get('/quotes', [\App\Http\Controllers\Api\QuoteController::class, 'index']);

Route::get('/quotes/random', [\App\Http\Controllers\Api\QuoteController::class, 'random']);
