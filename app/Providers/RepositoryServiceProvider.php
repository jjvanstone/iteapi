<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider 
{
    /**
     * Bootstrap services.
     * 
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register services
     * 
     * @return void
     */
    public function register () {
        $this->app->singleton('App\Interfaces\Repositories\IUserRepository', 'App\Repositories\UserRepository');
        $this->app->singleton('App\Interfaces\Repositories\IPostRepository', 'App\Repositories\PostRepository');
    }
}