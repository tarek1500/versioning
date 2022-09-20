<?php

namespace App\Providers;

use App\Http\Repositories\V1\User\UserRepository as UserRepositoryV1;
use App\Http\Repositories\V1\User\UserRepositoryInterface as UserRepositoryInterfaceV1;
use App\Http\Repositories\V2\User\UserRepository as UserRepositoryV2;
use App\Http\Repositories\V2\User\UserRepositoryInterface as UserRepositoryInterfaceV2;
use App\Http\Services\V1\User\UserService as UserServiceV1;
use App\Http\Services\V1\User\UserServiceInterface as UserServiceInterfaceV1;
use App\Http\Services\V2\User\UserService as UserServiceV2;
use App\Http\Services\V2\User\UserServiceInterface as UserServiceInterfaceV2;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterfaceV1::class, UserRepositoryV1::class);
        $this->app->singleton(UserRepositoryInterfaceV2::class, UserRepositoryV2::class);

        $this->app->singleton(UserServiceInterfaceV1::class, UserServiceV1::class);
        $this->app->singleton(UserServiceInterfaceV2::class, UserServiceV2::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
