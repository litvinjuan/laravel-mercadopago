<?php

namespace litvinjuan\LaravelPayments;

use Closure;
use litvinjuan\LaravelPayments\Handlers\CheckPaymentHandler;
use litvinjuan\LaravelPayments\Handlers\CompletePaymentHandler;
use litvinjuan\LaravelPayments\Handlers\PurchasePaymentHandler;
use litvinjuan\LaravelPayments\Payments\Payment;

class LaravelPayments
{

    /**
     * @param Payment $payment
     * @param Closure|null $callback
     * @return Payment
     * @throws Exceptions\InvalidRequestException
     * @throws Exceptions\InvalidGatewayException
     */
    public static function purchase(Payment $payment, Closure $callback = null): Payment
    {
        $response = (new PurchasePaymentHandler())->handle($payment);

        if ($callback) {
            $callback($response);
        }

        return $payment;
    }

    public static function complete(Payment $payment, Closure $callback = null): Payment
    {
        $response = (new CompletePaymentHandler())->handle($payment);

        if ($callback) {
            $callback($response);
        }

        return $payment;
    }

    public static function check(Payment $payment): bool
    {
        return (new CheckPaymentHandler())->handle($payment);
    }

}
