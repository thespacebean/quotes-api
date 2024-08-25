<?php

namespace App\DataSource;

use Illuminate\Support\Facades\Facade;

class DataSource extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'data-source';
    }
}
