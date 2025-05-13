<?php

namespace App\Providers;

use App\Services\Phone as PhoneService;
use Illuminate\Support\ServiceProvider;

class PhoneProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('phone', fn() => new PhoneService());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
