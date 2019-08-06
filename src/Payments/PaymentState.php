<?php

namespace litvinjuan\LaravelPayments\Payments;

use Konekt\Enum\Enum;

class PaymentState extends Enum
{

    const __default = self::PENDING;

    const PENDING = 'pending';
    const PURCHASED = 'purchased';
    const PAID = 'paid';
    const FAILED = 'failed';

    public static function all()
    {
        return [
            self::PENDING,
            self::PURCHASED,
            self::PAID,
            self::FAILED,
        ];
    }

    protected static $labels = [
        self::PENDING => 'Pending',
        self::PURCHASED => 'Purchased',
        self::PAID => 'Paid',
        self::FAILED => 'Failed',
    ];

    public function is($state)
    {
        return $this->value === $state;
    }

    public function isAny(array $names)
    {
        return in_array($this->value, $names, true);
    }

}
