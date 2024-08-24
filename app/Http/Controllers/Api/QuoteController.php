<?php

namespace App\Http\Controllers\Api;

use App\DataSource\DataSource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class QuoteController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $chunk = config('datasource.chunk_size');
        $quotes = DataSource::driver(config('datasource.default'))->getAll();
        $page = $request->query('page') ?? 1;
        $count = $quotes->count();
        $quotes = $quotes->skip($chunk * ($page - 1))
            ->take($chunk)
            ->values();

        return response()->json([
            'quotes' => $quotes,
            'count' => $count,
            'page' => $request->query('page') ?? 1,
            'total_pages' => ceil($count / $chunk),
        ]);
    }

    public function random(): \Illuminate\Http\JsonResponse
    {
        $quotes = DataSource::driver(config('datasource.default'))
            ->getRandom(config('datasource.chunk_size'));

        return response()->json([
            'quotes' => $quotes
        ]);
    }
}
