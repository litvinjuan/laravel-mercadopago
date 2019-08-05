<?php

namespace litvinjuan\MPPayments;

class BeginPaymentHandler
{

    /** @var CompletePaymentHandler */
    private $completePaymentHandler;

    public function __construct(CompletePaymentHandler $completePaymentHandler)
    {
        $this->completePaymentHandler = $completePaymentHandler;
    }

    public function handle(Payment $payment): Payment
    {
        return $this->completePaymentHandler->handle($payment);
    }

}
