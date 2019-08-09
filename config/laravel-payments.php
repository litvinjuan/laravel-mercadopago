<?php

return [

    'default_gateway' => 'mercado-pago',
    'currency' => 'USD',

    'gateways' => [
        'mercado-pago' => \litvinjuan\LaravelPayments\Gateways\MercadoPagoGateway::class,
//        'another' => Another\Gateway\Implementation::class,
    ],

];
