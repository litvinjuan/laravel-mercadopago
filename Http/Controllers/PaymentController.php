<?php

namespace litvinjuan\LaravelPayments\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use litvinjuan\LaravelPayments\CreateAndBeginPaymentHandler;
use litvinjuan\LaravelPayments\PaymentDTO;

class PaymentController extends Controller
{

    public function form($payable)
    {
        return view('laravel-payments::form')
            ->with('payable', $payable);
    }

    public function pay($payable, Request $request, CreateAndBeginPaymentHandler $createAndBeginPaymentHandler)
    {
        Validator::make(
            $request->all(),
            [
                'paymentMethodId' => 'required',
                'cardToken' => 'required',
            ]
        )->validate();

        $data = new PaymentDTO($request->get('paymentMethodId'), $request->get('cardToken'), $payable);
        $createAndBeginPaymentHandler->handle($data);

        return redirect()->route(config('laravel-payments.redirect-route-name'));
    }

}
