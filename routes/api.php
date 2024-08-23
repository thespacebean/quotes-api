<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/quotes', [\App\Http\Controllers\Api\QuoteController::class, 'index']);

