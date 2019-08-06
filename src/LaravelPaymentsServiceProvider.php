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
                __DIR__ . '/../database/migrations/create_payments_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_payments_table.php'),
            ], 'migrations');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-payments.php', 'laravel-payments');
    }

}
