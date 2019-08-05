<?php

namespace litvinjuan\MPPayments;

class CreateAndBeginPaymentHandler
{

    /** @var CreatePaymentHandler */
    private $createPaymentHandler;

    /** @var BeginPaymentHandler */
    private $beginPaymentHandler;

    public function __construct(CreatePaymentHandler $createPaymentHandler, BeginPaymentHandler $beginPaymentHandler)
    {
        $this->createPaymentHandler = $createPaymentHandler;
        $this->beginPaymentHandler = $beginPaymentHandler;
    }

    public function handle(PaymentPayload $payload)
    {
        $payment = $this->createPaymentHandler->handle($payload);
        $this->beginPaymentHandler->handle($payment);

        return $payment;
    }

}
