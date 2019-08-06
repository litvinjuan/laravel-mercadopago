<?php

namespace litvinjuan\LaravelPayments\Exceptions;

use Exception;

class InvalidGatewayException extends Exception
{

    public static function notSet()
    {
        return new self('Gateway not set in config file');
    }

    public static function notFound()
    {
        return new self('Gateway not found');
    }

    public static function invalid()
    {
        return new self('Invalid Gateway');
    }

    public static function disabled()
    {
        return new self('Gateway disabled');
    }

}
