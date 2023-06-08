<?php

namespace App\Http\Controllers;

use Omnipay\Omnipay;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_SECRET_KEY'));
        $this->gateway->setTestMode(true);
    }


    public function payment()
    {

        try {

            $response = $this->gateway->purchase([
                'amount' => '10.00',
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ])->send();
            // dd($response);
            if ($response->isRedirect()) {
                $response->redirect();
                // return redirect()->route('home')->with('success', 'payment successful');

            } else {
                return redirect()->route('home')->with('error', 'payment failed');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }


    public function success(Request $request)
    {
        if ($request->paymentId && $request->payerID) {

            $trnasaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('payerId'),
                'transactionReference' => $request->input('paymentId'),
            ));

            $response = $trnasaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();
                $payment_create = Payment::create([
                    'payment_id' => $arr['id'],
                    'payer_id' => $arr['payer']['payer_info']['payer_id'],
                    'payer_email' => $arr['payer']['payer_info']['email'],
                    'amount' => $arr['trnasaction'][0]['amount']['total'],
                    'currency' => env('PAYPAL_CURRENCY'),
                ]);

                if ($payment_create) {
                    dd($payment_create);
                } else {
                    dd('failed to store');
                }
            }
        }
    }

    public function error()
    {
        dd('declined');
    }
}
