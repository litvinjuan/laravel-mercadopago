<?php

namespace litvinjuan\MPPayments\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

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

        $data = new PaymentDTO($request->get('paymentMethodId'), $request->get('cardToken'), $payable, $payable->payer());
        $createAndBeginPaymentHandler->handle($data);
    }

}
