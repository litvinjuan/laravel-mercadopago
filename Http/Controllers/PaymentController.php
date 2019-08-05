<?php

namespace litvinjuan\MPPayments\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use litvinjuan\MPPayments\CreateAndBeginPaymentHandler;
use litvinjuan\MPPayments\Payable;
use litvinjuan\MPPayments\PaymentDTO;

class PaymentController extends Controller
{

    public function form(Payable $payable)
    {
        return view('mppayments::form')
            ->with('payable', $payable);
    }

    public function pay(Payable $payable, Request $request, CreateAndBeginPaymentHandler $createAndBeginPaymentHandler)
    {
        Validator::make(
            $request->all(),
            [
                'paymentMethodId' => 'required',
                'cardToken' => 'required',
            ]
        )->validate();

        $data = new PaymentDTO($request->get('paymentMethodId'), $request->get('cardToken'), $payable);
        $payment = $createAndBeginPaymentHandler->handle($data);

        return redirect()->route(config('mppayments.redirect-route-name'));
    }

}
