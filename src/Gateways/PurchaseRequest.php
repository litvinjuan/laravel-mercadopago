<?php

namespace litvinjuan\LaravelPayments\Gateways;

use Exception;
use litvinjuan\LaravelPayments\Payments\PaymentState;
use MercadoPago\Payment as MPPayment;
use MercadoPago\SDK as MP;

class PurchaseRequest extends AbstractRequest
{

    protected $required = [
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
        $mpPayment->payer = [
            'email' => $this->payment->payer->getPayerEmail()
        ];

        $response = $mpPayment->save();

        // Save received response data
        $this->saveReceivedResponseData($response);

        $data = [
            'id' => $response['id'],
            'state' => $this->translateState($response['status'], $response['status_detail']),
        ];

        return new PurchaseResponse($data);
    }

    /**
     * @return string
     */
    private function getCardToken(): string
    {
        return $this->payment->data['cardToken'];
    }

    /**
     * @return string
     */
    private function getPaymentMethodId(): string
    {
        return $this->payment->data['paymentMethodId'];
    }

    /**
     * @return string
     */
    private function getAccessToken(): string
    {
        $this->getParameter('accessToken');
    }

    /**
     * @param string $status
     * @param string $status_detail
     * @return PaymentState
     */
    private function translateState(string $status, string $status_detail)
    {
        if ($status !== 'approved' || $status_detail !== 'accredited') {
            return new PaymentState(PaymentState::FAILED);
        }

        return new PaymentState(PaymentState::COMPLETED);
    }

}
