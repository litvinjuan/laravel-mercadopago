<?php


use litvinjuan\LaravelPayments\Gateways\GatewayInterface;

class ShortNameGenerator
{

    public static function generate(GatewayInterface $gateway)
    {
        return strtolower($gateway->getName());
    }

}
