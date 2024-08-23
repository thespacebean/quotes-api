<?php

namespace App\Http\Controllers\Api;

use App\DataSource\DataSource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class QuoteController extends Controller
{
    public function index()
    {
        $quotes = DataSource::driver(config('datasource.default'))->getRandom();

        return response()->json([
            'quotes' => $quotes
        ]);
    }
}
