<?php

namespace Tests\Unit;

use App\DataSource\DataSource;
use App\DataSource\LoremIpsumDataSource;
use Illuminate\Support\Facades\Cache;
use Mockery\Matcher\Closure;
use Tests\TestCase;

class DataSourceTest extends TestCase
{

    public function test_data_source_gets_correct_number_of_quotes(): void
    {
        $count = config('datasource.chunk_size');
        $randoms = DataSource::driver('lorem-ipsum')->getRandom($count)->toArray();

        $this->assertCount($count, $randoms);
    }

    public function test_cache_is_called_for_http_datasource(): void
    {
        Cache::shouldReceive('remember')
            ->with('quotes', strtotime('tomorrow 02:00'), \Closure::class)
            ->once()
            ->andReturn(collect([]));

        DataSource::driver('kanye-api')->getAll();
    }

}
