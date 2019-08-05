<?php

namespace litvinjuan\MPPayments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Konekt\Enum\Eloquent\CastsEnums;
use Money\Money;

/**
 * Class Payment
 * @package App\Models\Payment
 *
 * @property int $id
 * @property string $mp_id
 * @property string $description
 * @property string $payment_method_id
 * @property string $card_token
 *
 * @property Money $price
 * @property Money $paid
 *
 * @property PaymentState $state
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

    protected $enums = [
        'state' => PaymentState::class,
    ];

    public function payable()
    {
        return $this->morphTo();
    }

    public function payer()
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

}
