<?php

namespace App\Http\Controllers\Api;

use App\DataSource\DataSource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class QuoteController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = DataSource::driver(config('datasource.default'));
        $quotes = $data->paginate();

        return response()->json(array_merge([
            'quotes' => $quotes,
        ], $data->getPaginationInfo()));
    }

    public function random(): \Illuminate\Http\JsonResponse
    {
        $data = DataSource::driver(config('datasource.default'));

        return response()->json([
            'quotes' => $data->getRandom(config('datasource.chunk_size'))
        ]);
    }
}
