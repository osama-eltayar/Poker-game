<?php

namespace App\Providers;

use App\Repositories\GameRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\GameRepositoryInterface;

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
            GameRepositoryInterface::class,
            GameRepository::class
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
