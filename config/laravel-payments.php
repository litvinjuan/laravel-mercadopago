<?php

return [

    'default_gateway' => 'default',
    'currency' => 'USD',

    'gateways' => [
        'default' => [
            'gateway' => 'Gateway\Class',
            'params' => [
                'key1' => 'value1',
            ],
        ],

//        'another' => [
//            'gateway' => 'Gateway\Class',
//            'params' => [
//                'key1' => 'value1',
//            ],
//        ],
    ],

];
