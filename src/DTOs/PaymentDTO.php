<?php

namespace litvinjuan\MPPayments;

class PaymentDTO implements PaymentPayload
{

    /** @var string */
    private $paymentMethodId;

    /** @var string */
    private $cardToken;

    /** @var Payable */
    private $payable;

    /** @var Payer */
    private $payer;

    public function __construct(string $paymentMethodId, string $cardToken, Payable $payable, Payer $payer)
    {
        $this->paymentMethodId = $paymentMethodId;
        $this->cardToken = $cardToken;
        $this->payable = $payable;
        $this->payer = $payer;
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

    public function payer(): Payer
    {
        return $this->payer;
    }

}
