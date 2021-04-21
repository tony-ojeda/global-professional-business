<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PayPalService;

class PayPalController extends Controller
{
    public function pay()
    {
        $paymentPlatform = resolve(PayPalService::class);

        $response = [
            'url' =>$paymentPlatform->handlePayment(request()->all())
        ];

        return response()->json($response,200);
    }

    public function approval()
    {
        $paymentPlatform = resolve(PayPalService::class);
        $token = request('token');
        $payment = $paymentPlatform->capturePayment($token);

        var_dump($payment);

        return;

        // return $paypal->capturePayment($token);
        // return $token;
        // return "approved";
    }

    public function cancel()
    {
        return "cancelled";
    }
}
