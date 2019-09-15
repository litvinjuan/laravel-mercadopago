<?php

namespace litvinjuan\LaravelPayments\Payments;

use Konekt\Enum\Enum;

class PaymentState extends Enum
{

    const __DEFAULT = self::PENDING;

    const PENDING = 'pending';

    const AUTHORIZING = 'authorizing';
    const AUTHORIZED = 'authorized';

    const CAPTURED = 'captured';

    const VOIDED = 'voided';

    const RETURNED = 'returned';
    const PARTIALLY_RETURNED = 'partially-returned';

    const PURCHASING = 'purchasing';
    const PURCHASED = 'purchased'; // Completed

    const FAILED = 'failed';

    public static function all()
    {
        return [
            self::PENDING,
            self::AUTHORIZING,
            self::AUTHORIZED,
            self::CAPTURED,
            self::VOIDED,
            self::RETURNED,
            self::PARTIALLY_RETURNED,
            self::PURCHASING,
            self::PURCHASED,
            self::FAILED,
        ];
    }

    protected static $labels = [
        self::PENDING => 'Pending',
        self::AUTHORIZING => 'Authorizing',
        self::AUTHORIZED => 'Authorized',
        self::CAPTURED => 'Captured',
        self::VOIDED => 'Voided',
        self::RETURNED => 'Returned',
        self::PARTIALLY_RETURNED => 'Partially Returned',
        self::PURCHASING => 'Purchasing',
        self::PURCHASED => 'Purchased',
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
