<?php

namespace litvinjuan\LaravelPayments\Payments;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Konekt\Enum\Eloquent\CastsEnums;
use Money\Money;

/**
 * Class Payment
 * @package litvinjuan\LaravelPayments\Payment
 *
 * @property int $id
 *
 * @property string|null $gateway_name
 * @property string|null $gateway_id
 *
 * @property Money $price
 * @property Money|null $paid
 * @property string $description
 *
 * @property PaymentState $state
 * @property array $parameters
 *
 * @property-read Payable $payable
 * @property-read Payer $payer
 *
 * @property Carbon $completed_at
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
class Payment extends Model
{
    use SoftDeletes;
    use CastsEnums;

    protected $dates = [
        'completed_at'
    ];

    protected $casts = [
        'parameters' => 'array'
    ];

    protected $enums = [
        'state' => PaymentState::class,
    ];

    public function payable(): MorphTo
    {
        return $this->morphTo();
    }

    public function payer(): MorphTo
    {
        return $this->morphTo();
    }

    public function getPriceAttribute(): Money
    {
        return money($this->attributes['price']);
    }

    public function setPriceAttribute(Money $money)
    {
        $this->attributes['price'] = $money->getAmount();
    }

    public function getPaidAttribute(): Money
    {
        return money($this->attributes['paid']);
    }

    public function setPaidAttribute(Money $money)
    {
        $this->attributes['paid'] = $money->getAmount();
    }

    public function setCompletedAtAttribute(Carbon $completed_at)
    {
        if ($this->completed_at) {
            throw new Exception('The completed_at attribute can only be set once');
        }

        $this->attributes['completed_at'] = $completed_at;
    }

    public function setGateway(string $gateway)
    {
        $this->gateway_name = $gateway;
        $this->save();
    }

    /**
     * @param $key
     * @param $value
     */
    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;
        $this->save();
    }

    /**
     * @param $key
     * @param null $default
     *
     * @return mixed|null
     */
    public function getParameter($key, $default = null)
    {
        return $this->parameters[$key] ?? $default;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

}
