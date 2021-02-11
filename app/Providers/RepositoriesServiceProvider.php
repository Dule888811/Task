<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Admin\TaskRepository;
use App\Repositories\Admin\TaskRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TaskRepositoryInterface::class,TaskRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
    }
}
