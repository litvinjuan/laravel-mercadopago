<?php

namespace litvinjuan\LaravelPayments;

class PaymentDTO implements PaymentPayload
{

    /** @var string */
    private $paymentMethodId;

    /** @var string */
    private $cardToken;

    /** @var Payable */
    private $payable;

    public function __construct(string $paymentMethodId, string $cardToken, Payable $payable)
    {
        $this->paymentMethodId = $paymentMethodId;
        $this->cardToken = $cardToken;
        $this->payable = $payable;
    }

    public function paymentMethodId(): string
    {
        return $this->paymentMethodId;
    }

    public function cardToken(): string
    {
        return $this->cardToken;
    }

    public function payable(): Payable
    {
        return $this->payable;
    }

}
