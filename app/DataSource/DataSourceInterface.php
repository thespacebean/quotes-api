<?php

namespace App\DataSource;

use App\Traits\PaginatesTrait;
use Illuminate\Support\Collection;

interface DataSourceInterface
{
    public function getAll(): Collection;

    public function getRandom(?int $count = 5): Collection;

    public function paginate(): Collection;

    public function getPaginationInfo(): array;
}
