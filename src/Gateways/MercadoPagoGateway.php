<?php

namespace litvinjuan\LaravelPayments\Gateways;

use litvinjuan\LaravelPayments\Requests\AbstractRequest;
use litvinjuan\LaravelPayments\Requests\PurchaseRequest;

class MercadoPagoGateway extends AbstractGateway
{

    /**
     * Gateway name that can be displayed to users
     * @return string
     */
    public function getName(): string
    {
        return 'Mercado Pago';
    }

    /**
     * Get the gateway's default parameters
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'publicKey' => 'asdasd',
            'accessToken' => 'TEST-4833906404675760-080819-6aa8ba3ba7234b4857e83038d4ee09b5-159439193',
            'clientId' => 'asdasdasdasdasd',
            'clientSecret' => 'saddddddasdddsdsasdaddddddsdasdsdasdasaaaaaasdasdasd',
        ];
    }

    /**
     * @return AbstractRequest
     */
    public function purchase()
    {
        return $this->createRequest(PurchaseRequest::class);
    }

}
