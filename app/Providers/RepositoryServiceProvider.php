<?php

namespace App\Providers;

use App\Repositories\Interfaces\IPromocodeRepository;
use App\Repositories\PromocodeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            IPromocodeRepository::class,
            PromocodeRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
