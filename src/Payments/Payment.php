<?php

namespace litvinjuan\LaravelPayments\Payments;

use Carbon\Carbon;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Konekt\Enum\Eloquent\CastsEnums;
use litvinjuan\LaravelPayments\Handlers\CheckPaymentHandler;
use litvinjuan\LaravelPayments\Handlers\CompletePaymentHandler;
use litvinjuan\LaravelPayments\Handlers\PurchasePaymentHandler;
use Money\Money;

/**
 * Class Payment
 * @package litvinjuan\LaravelPayments\Payment
 *
 * @property int $id
 *
 * @property string $description
 * @property Money $price
 * @property Money $paid
 *
 * @property PaymentState $state
 * @property string $provider
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
    use PaymentAttributes;

    protected $dates = [
        'completed_at'
    ];

    protected $enums = [
        'state' => PaymentState::class,
    ];

    public function purchase(Closure $callback = null): self
    {
        $response = (new PurchasePaymentHandler())->handle($this);

        if ($callback) {
            $callback($response);
        }

        return $this;
    }

    public function complete(Closure $callback = null): self
    {
        $response = (new CompletePaymentHandler())->handle($this);

        if ($callback) {
            $callback($response);
        }

        return $this;
    }

    public function check(): bool
    {
        return (new CheckPaymentHandler())->handle($this);
    }

}
