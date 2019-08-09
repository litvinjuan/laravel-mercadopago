<?php

namespace litvinjuan\LaravelPayments\Util;

use Illuminate\Support\Str;
use litvinjuan\LaravelPayments\Gateways\GatewayInterface;

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
