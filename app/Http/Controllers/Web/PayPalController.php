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
            $enterprise_id = $payment->purchase_units[0]->payments->captures[0]->custom_id;
            $membership_id = $payment->purchase_units[0]->reference_id;

            $this->disabledPreviousMemberships($enterprise_id);
            $this->generateEnterpriseMembership($enterprise_id, $membership_id, $payment);
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('frontend.directory.my_business');
    }

    public function cancel()
    {
        return redirect()->route('frontend.directory.my_business');
    }

    public function disabledPreviousMemberships($enterprise_id)
    {
        $now = date('Y-m-d');
        $where = [
            [ "enterprise_id", '=', $enterprise_id ],
            [ "is_active", '=', 1 ]
        ];
        $records = $this->enterpriseMembership->list('*', [], $where);

        foreach ($records as $key => $record) {
            $record->update([
                'is_active' => false,
                'change_membership_at' => $now
            ]);
        }
    }

    public function generateEnterpriseMembership($enterprise_id, $membership_id, $paypal_data = [])
    {
        $data = [
            'enterprise_id' => $enterprise_id,
            'membership_id' => $membership_id,
            'paypal_data' => $paypal_data,
            'is_active' => true
        ];

        return $this->enterpriseMembership->createUpdate($data);
    }
}
