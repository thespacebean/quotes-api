<?php

namespace App\Http\Controllers\Api;

use App\DataSource\DataSource;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $quotes = DataSource::paginate();
        $info = DataSource::getPaginationInfo();

        return response()->json(array_merge([
            'quotes' => $quotes,
        ], $info));
    }

    public function random(): \Illuminate\Http\JsonResponse
    {
        $quotes = DataSource::getRandom(config('datasource.chunk_size'));

        return response()->json([
            'quotes' => $quotes
        ]);
    }
}
