<?php

namespace App\DataSource;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class KanyeApiDataSource implements DataSourceInterface
{

    public function getAll()
    {
        return Cache::remember('quotes', 360, function() {

            $response = Http::get('https://api.kanye.rest/quotes');

            return collect($response->json())->shuffle();
        });
    }

    public function getRandom(?int $count = 5)
    {
        return $this->getAll()->random($count);
    }
}
