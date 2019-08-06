<?php

return [

    'default_gateway' => 'dummy',

    'gateways' => [
        'dummy' => \litvinjuan\LaravelPayments\Gateways\DummyGateway::class,

//        'another' => Another\Gateway\Implementation::class,
    ],

];
