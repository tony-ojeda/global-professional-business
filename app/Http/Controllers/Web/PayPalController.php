<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Repositories\EnterpriseMembershipRepository as EnterpriseMembership;

class PayPalController extends Controller
{
    protected $enterpriseMembership;

    public function __construct(EnterpriseMembership $enterpriseMembership)
    {
        $this->enterpriseMembership = $enterpriseMembership;
    }

    public function pay()
    {
        $paymentPlatform = resolve(PayPalService::class);

        $response = [
            'url' =>$paymentPlatform->handlePayment(request()->all())
        ];

        return response()->json($response, 200);
    }

    public function payment_url($request)
    {
        $paymentPlatform = resolve(PayPalService::class);

        $url = $paymentPlatform->handlePayment($request);

        return $url;
    }

    public function approval()
    {
        try {
            $paymentPlatform = resolve(PayPalService::class);
            $token = request('token');
            $payment = $paymentPlatform->capturePayment($token);
    
            $data = [
                'enterprise_id' => $payment->purchase_units[0]->payments->captures[0]->custom_id,
                'membership_id' => $payment->purchase_units[0]->reference_id,
                'paypal_data' => $payment
            ];
    
            $model = $this->enterpriseMembership->createUpdate($data);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('frontend.directory.my_business');
    }

    public function cancel()
    {
        return redirect()->route('frontend.directory.my_business');
    }
}
