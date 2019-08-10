<?php

namespace litvinjuan\LaravelPayments\Exceptions;

use Exception;

class InvalidRequestException extends Exception
{

    public static function notSupported()
    {
        return new self('This gateway does not support this request.');
    }

    public static function noPayment()
    {
        return new self('You must set a payment before you can send a request.');
    }

    public static function alreadySent()
    {
        return new self('You cannot modify or send a request that has already been sent.');
    }

    public static function missingParameters(string $key)
    {
        return new self("The following parameter is missing in your request: [$key]");
    }

    public static function zeroAmount()
    {
        return new self('This request does not allow an amount of 0');
    }

    public static function notFound($request)
    {
        return new self("The request [$request] does not exists.");
    }

}
