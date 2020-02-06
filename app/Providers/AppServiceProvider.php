<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Services\Contracts\UserServiceInterface',
            'App\Services\UserService'
        );
        $this->app->bind(
            'App\Repositories\Contracts\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );
        $this->app->bind(
            'App\Services\Contracts\ContactServiceInterface',
            'App\Services\ContactService'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ContactRepositoryInterface',
            'App\Repositories\ContactRepository'
        );
        $this->app->bind(
            'App\Services\Contracts\MessageServiceInterface',
            'App\Services\MessageService'
        );
        $this->app->bind(
            'App\Repositories\Contracts\MessageRepositoryInterface',
            'App\Repositories\MessageRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
