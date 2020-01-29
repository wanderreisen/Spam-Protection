<?php

namespace Wanderreisen\SpamProtection;

use Illuminate\Support\ServiceProvider;

class SpamProtectionServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            //$this->publishes();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/spamprotection.php', 'spamprotection');
    }
}
