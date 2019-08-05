<?php

use Illuminate\Support\ServiceProvider;

class MPPaymentsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/mppayments.php' => config_path('mppayments.php'),
        ], 'config');

        if (! class_exists('CreatePaymentsTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_payments_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_payments_table.php'),
            ], 'migrations');
        }

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/mppayments'),
        ], 'views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mppayments');

        $this->loadRoutesFrom(__DIR__.'../routes/routes.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/mppayments.php', 'mppayments');
    }

}
