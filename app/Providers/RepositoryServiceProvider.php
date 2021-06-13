<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\ElequentRepositoryInterface; 
use App\Repositories\UserRepositoryInterface; 
use App\Repositories\EmployeeRepositoryInterface; 
use App\Repositories\PsCaseRepositoryInterface; 
use App\Repositories\PsWorkerRepositoryInterface; 

use App\Repositories\Elequent\BaseRepository; 
use App\Repositories\Elequent\UserRepository; 
use App\Repositories\Elequent\EmployeeRepository; 
use App\Repositories\Elequent\PsCaseRepository; 
use App\Repositories\Elequent\PsWorkerRepository; 

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(ElequentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(PsCaseRepositoryInterface::class, PsCaseRepository::class);
        $this->app->bind(PsWorkerRepositoryInterface::class, PsWorkerRepository::class);
    }


/*     $models = array(
        'User',
        'Employee',
    );

    foreach ($models as $model) {
        $this->app->bind("App\\Repositories\\{$model}RepositoryInterface", "App\\Repositories\\Elequeent\\{$model}Repository");
    } */


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
