<?php

namespace App\DataSource;

use App\Traits\PaginatesTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class KanyeApiDataSource implements DataSourceInterface
{

    use PaginatesTrait;
    public function getAll(): Collection
    {
        return Cache::remember('quotes', strtotime('tomorrow 02:00'), function() {

            $response = Http::get('https://api.kanye.rest/quotes');

            return collect($response->json())->shuffle();
        });
    }

    public function getRandom(?int $count = 5): Collection
    {
        return $this->getAll()->random($count);
    }

    public function paginate(): Collection
    {
        return $this->paginateCollection($this->getAll());
    }

    public function getPaginationInfo(): array
    {
        return $this->buildAdditionalInfoArray($this->getAll());
    }
}
