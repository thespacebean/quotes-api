<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait PaginatesTrait
{
    protected int $page;
    protected int $chunk;

    public function __construct()
    {
        $this->page = request()->query('page') ?? 1;
        $this->chunk = config('datasource.chunk_size');
    }

    public function paginateCollection(Collection $collection): Collection
    {
        return $collection->skip($this->chunk * ($this->page - 1))
            ->take($this->chunk)
            ->values();
    }

    public function buildAdditionalInfoArray(Collection $collection): array
    {
        $count = $collection->count();

        return [
                'count' => $count,
                'page' => $this->page,
                'total_pages' => ceil($count / $this->chunk)
            ];
    }
}
