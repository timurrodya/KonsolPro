<?php

namespace Timurrodya\KonsolPro;

use Illuminate\Support\ServiceProvider;

class KonsolProServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // php artisan vendor:publish --provider='Timurrodya\KonsolPro\KonsolProServiceProvider' --tag=config
        $this->publishes([
            __DIR__ . '/../config/konsolpro.php' => config_path('konsolpro.php'),
        ], 'config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/konsolpro.php', 'konsolpro');

        $this->app->bind('konsolpro', function () {
            return new KonsolPro;
        });
    }
}
