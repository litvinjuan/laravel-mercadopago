<?php

namespace litvinjuan\LaravelPayments\Exceptions;

use Exception;
use Illuminate\Support\Collection;

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

    public static function missingParameters(Collection $parameters)
    {
        return new self('The following parameters were missing in your request: ' . $parameters->implode(', '));
    }

    public static function zeroAmount()
    {
        return new self('This request does not allow an amount of 0');
    }

}
