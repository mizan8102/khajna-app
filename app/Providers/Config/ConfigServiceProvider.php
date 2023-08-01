<?php

namespace App\Providers\Config;

use App\Http\Services\config\Menu\MenuRepositoryServices;
use App\Repositories\Config\Menu\MenuRepository;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MenuRepository::class,MenuRepositoryServices::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
