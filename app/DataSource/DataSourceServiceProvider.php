<?php

namespace App\DataSource;
use Illuminate\Support\ServiceProvider;

class DataSourceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('data-source', function ($app) {
            return new DataSourceManager($app);
        });
    }
}
