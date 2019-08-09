<?php

namespace litvinjuan\LaravelPayments\Responses;

use litvinjuan\LaravelPayments\Payments\PaymentState;
use Money\Money;

class PurchaseResponse extends AbstractResponse
{
    /**
     * @returns PaymentState
     */
    public function getState()
    {
        return $this->translateState($this->data['status'], $this->data['status_detail']);;
    }

    /**
     * @return bool
     */
    public function isRedirect()
    {
        return false;
    }

    /**
     * @return string|null
     */
    public function getMessage()
    {
        return null;
    }

    /**
     * @return string|null
     */
    public function getGatewayId()
    {
        return $this->data['id'];
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

    /**
     * @return Money
     */
    public function getPaidMoney()
    {
        return money($this->data['transaction_amount']);
    }

    /**
     * @return bool
     */
    public function validated()
    {
        return $this->data['status'] === 'approved' && $this->data['status_detail'] === 'accredited';
    }
}
