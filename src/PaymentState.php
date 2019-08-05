<?php

namespace litvinjuan\MPPayments;

use Konekt\Enum\Enum;

class PaymentState extends Enum
{

    const __default = self::PENDING;

    const PENDING = 'pending';
    const FAILED = 'failed';
    const COMPLETED = 'completed';

    public static function all()
    {
        return [
            self::PENDING,
            self::FAILED,
            self::COMPLETED,
        ];
    }

    protected static $labels = [
        self::PENDING => 'Pendiente',
        self::FAILED => 'Fallado',
        self::COMPLETED => 'Completado',
    ];

    protected static $colors = [
        self::PENDING => 'dark',
        self::FAILED => 'danger',
        self::COMPLETED => 'success',
    ];

    public static function translatedValues(){
        return static::$labels;
    }

    public function is($state)
    {
        return $this->value === $state;
    }

    public function isAny(array $names)
    {
        return in_array($this->value, $names, true);
    }

    public function color()
    {
        return isset(static::$labels[$this->value()]) ? static::$colors[$this->value()] : 'light';
    }

}
