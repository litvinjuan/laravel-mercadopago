<?php

namespace litvinjuan\LaravelPayments\Gateways;

use Illuminate\Support\Str;

class GatewayShortNameGenerator
{

    /**
     * Generate a Short Name for the given Gateway
     *
     * @param GatewayInterface $gateway
     * @return string
     */
    public static function generate(GatewayInterface $gateway)
    {
        return Str::kebab($gateway->getName());
    }

}
