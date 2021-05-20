<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PsCaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\PsCaseRepositoryInterface',
            'App\Repositories\PsCaseRepository'
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
