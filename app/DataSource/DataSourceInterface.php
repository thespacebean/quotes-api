<?php

namespace App\DataSource;

interface DataSourceInterface
{
    public function getAll();

    public function getRandom(?int $count = 5);
}
