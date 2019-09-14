# Easily store payments and handle payment gateways in Laravel

This package provides traits and interfaces that will let you easily create and store payments, as well as provide you with a streamlined interface to interact with payment gateways.

---

## Installation

You can install the package via composer:
``` bash
composer require litvinjuan/laravel-payments
```

If you are using a `Laravel version below 5.5`, you need to add the following to your `config/app.php` file:
```php
'providers' => [
    litvinjuan\LaravelPayments\LaravelPaymentsServiceProvider::class,
]
```

Next, you need to publish the config and migration files. Run the following command in your project's root:
``` bash
php artisan vendor:publish --provider="litvinjuan\LaravelPayments\LaravelPaymentsServiceProvider"
```

Last, run the migrations so that your payments table is created:
``` bash
php artisan migrate
```


## Usage

You will have to create a Model that implements the `Payable` interface and the `HasPayment` trait. This is the model your users will be paying for (ej. Order, Product).

The `Payable` interface has 3 methods you'll need to implement yourself: `getPayablePrice()` should return the total price that should be paid, `getPayableDescription()` should return the payment description that should be used in the bank statement and for future reference, `payer()` should return a reference to whoever should make the payment.

Here's an example:
```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use litvinjuan\LaravelPayments\Payments\HasPayment;
use litvinjuan\LaravelPayments\Payments\Payable;
use litvinjuan\LaravelPayments\Payments\Payer;
use litvinjuan\LaravelPayments\Payments\Payment;
use Money\Money;

/**
 * @property int $id
 * @property Money $total
 * @property User $buyer
 * @property Payment $payment
 */
class Order extends Model implements Payable
{
    use HasPayment;

    public function getPayablePrice(): Money
    {
        return $this->total;
    }

    public function getPayableDescription(): string
    {
        return 'This is a dummy bank statement';
    }

    public function payer(): Payer
    {
        return $this->buyer;
    }
}
```

---

You will also need to create a Model that implements the `Payer` interface and the `CanPay` trait. This is the model that represents whoever will be paying (tip: this is generally your User model).

The `Payer` interface has 1 method you'll need to implement yourself: `getPayerEmail()` should return the payer's email address.

Here's an example:
```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use litvinjuan\LaravelPayments\Payments\CanPay;
use litvinjuan\LaravelPayments\Payments\Payer;
use litvinjuan\LaravelPayments\Payments\Payment;

/**
 * @property int $id
 * @property string $email
 * @property-read Payment[] $payments
 */
class User extends Model implements Payer
{
    use CanPay;

    public function getPayerEmail(): string
    {
        return $this->email;
    }
}

```

Whenever you need to make a purchase, create your Payable model as you normally would.
```php
$order = new Order();
$order->total = new Money(2900, 'USD');
$order->save();
```

Once you have your Payable instance, you can call the `createPayment` method.
```php
$payment = order->createPayment();
```

To interact with gateways, you first need to get a Gateway instance:
```php
$gateway = GatewayFactory::make($payment);
```
This will return a Gateway instance based on the payment's gateway_name attribute.

Then we can check that the gateway supports the call we are trying to make:
```php
if (! $gateway->supportsPurchase()) {
    throw InvalidRequestException::notSupported();
}

if (! $gateway->supportsRefund()) {
    throw InvalidRequestException::notSupported();
}

// ...
// See full list of calls below
```

The following 10 calls are currently supported:
```php
* Authorize             // Authorize an amount on the customer's card
* CompleteAuthorize     // Handle return from off-site authorization  
* Capture               // Capture a previously authorized amount
* Purchase              // Automatically authorize and purchase an amount on the customer's card
* CompletePurchase      // Handle return from off-site authorization
* GetPayment            // Get information about a specific payment
* PaymentNotification   // Process a received payment notification
* Refund                // Refund a previously charged amount to the customer's card
* Void                  // Void a payment
* ValidatePayment       // Validates whether a payment was successful or not
```
**Note:** It is recommended that you use the `ValidatePayment` call before approving your customer's purchase.

**Note:** Individual gateways might not support every call, and thus you should always check the corresponding supports() method.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

If you discover any security related issues, please email litvinjuan@gmail.com instead of using the issue tracker.

## Credits

- [Juan Litvin](https://juanlitvin.com)

## Support us


## License

The MIT License (MIT). Please see the [License File](LICENSE.md) for more information.
