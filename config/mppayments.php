<?php

return [

    /*
     * Fields for Custom Checkout
     */
    'public-key' => env('MPPAYMENTS_PUBLIC_KEY', ''),
    'access-token' => env('MPPAYMENTS_ACCESS_TOKEN', ''),

    /*
     * Fields for Basic Checkout
     */
    'client-id' => env('MPPAYMENTS_CLIENT_ID', ''),
    'client-secret' => env('MPPAYMENTS_CLIENT_SECRET', ''),

    /*
     * Name of the route where the user should be redirected after making the payment
     */
    'redirect-route-name' => 'paid'

];
