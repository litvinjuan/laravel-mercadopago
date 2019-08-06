<?php

namespace litvinjuan\LaravelPayments;

use Illuminate\Support\ServiceProvider;

class LaravelPaymentsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-payments.php' => config_path('laravel-payments.php'),
        ], 'config');

        if (! class_exists('CreatePaymentsTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/2019_01_01_000000_create_payments_table.php.stub' => database_path('migrations/2019_01_01_000000_create_payments_table.php'),
            ], 'migrations');
        }

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-payments'),
        ], 'views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-payments');

        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/payments.php', 'laravel-payments');
    }

}
