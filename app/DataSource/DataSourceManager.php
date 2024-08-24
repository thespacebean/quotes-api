<?php

namespace App\DataSource;

use Illuminate\Support\Manager;

class DataSourceManager extends Manager
{
    public function getDefaultDriver()
    {
        return 'kanye-api';
    }

    public function createKanyeApiDriver(): KanyeApiDataSource
    {
        return new KanyeApiDataSource();
    }

    public function createLoremIpsumDriver(): LoremIpsumDataSource
    {
        return new LoremIpsumDataSource();
    }
}
