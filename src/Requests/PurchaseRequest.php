<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Responses\AbstractResponse;
use litvinjuan\LaravelPayments\Responses\PurchaseResponse;
use MercadoPago\Payment as MPPayment;
use MercadoPago\SDK as MP;

class PurchaseRequest extends AbstractRequest
{

    protected $requiredParameters = [
        'cardToken',
        'paymentMethodId',
    ];

    /**
     * Initialize the request
     *
     * @return void
     */
    protected function init()
    {
        MP::setAccessToken($this->getAccessToken());
    }

    /**
     * Execute the request and return a response
     *
     * @return AbstractResponse
     * @throws Exception
     */
    protected function execute()
    {
        $mpPayment = new MPPayment();
        $mpPayment->transaction_amount = $this->payment->price;
        $mpPayment->token = $this->getCardToken();
        $mpPayment->payment_method_id = $this->getPaymentMethodId();
        $mpPayment->description = $this->payment->description;
        $mpPayment->statement_descriptor = $this->payment->description;
        $mpPayment->payer = [
            'email' => $this->payment->payer->getPayerEmail()
        ];

        $response = $mpPayment->save();

        return new PurchaseResponse($response);
    }

    /**
     * @return string
     */
    private function getCardToken(): string
    {
        return $this->payment->getParameter('cardToken');
    }

    /**
     * @return string
     */
    private function getPaymentMethodId(): string
    {
        return $this->payment->getParameter('paymentMethodId');
    }

    /**
     * @return string
     */
    private function getAccessToken(): string
    {
        return $this->getParameter('accessToken');
    }

}
