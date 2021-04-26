<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\EnterpriseRepository as Enterprise;
use App\Membership;

class EnterpriseController extends Controller
{
    public function __construct(Enterprise $enterprise)
    {
        $this->enterprise = $enterprise;
    }

    public function list()
    {
        $user = request()->user();
        $records = $this->enterprise->listFrontend($user);

        return response()->json($records, 200);
    }

    public function controller()
    {
        $id = request('id');
        // VALIDACIONES
        $messages = [
            'category_id.required' => 'La categoría es obligatoria.',
            'name.required' => 'El nombre es obligatorio.',
            'website.required' => 'El website es obligatorio.',
            'phone.required' => 'El teléfono es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'details.required' => 'Los detalles son obligatorios.',
            'schedule.required' => 'El horario es obligatorio.',
            'portrait_image.required' => 'La imagen es obligatoria.',
            'portrait_image.image' => 'Tiene que ser una imagen válida.',
            'portrait_image.mimes' => 'Use un formato válido jpg, jpeg, png.',
            'portrait_image.max' => 'La imagen máximo puede pesar: max kb.',
        ];

        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'portrait_image' => 'image|mimes:jpg,jpeg,png|max:800',
            'membership_id' => 'required'
        ];

        if (!is_null($id)) {
            $rules["portrait_image"] = 'image|mimes:jpg,jpeg,png|max:800';
        }

        request()->validate($rules, $messages);
        ////////

        // REGISTRO | ACTUALIZACION
        $data = request()->except(['membership_id','change_membership']);
        $data["user_id"] = request()->user()->id;
        $response = [
            "error" => false,
            "type" => 3,
            "title" => "OK",
            "subtitle" => "Empresa creada correctamente",
            "url" => route('frontend.directory.my_business')
        ];
        try {
            $model = $this->enterprise->createUpdate($data);
            if (!$model->wasRecentlyCreated) {
                $response["subtitle"] = "Empresa actualizada correctamente";
            }
            $membership = Membership::find(request('membership_id'));
            if (is_null($id) && $membership->id != 1) {
                $this->paypalTrigger($model, $membership, $response);
            } elseif (!is_null($id) && request('change_membership') && $membership->id != 1) {
                $this->paypalTrigger($model, $membership, $response);
            } elseif (is_null($id) && $membership->id == 1) {
                app('App\Http\Controllers\Web\PayPalController')->disabledPreviousMemberships($model->id);
                app('App\Http\Controllers\Web\PayPalController')->generateEnterpriseMembership($model->id, $membership->id);
            }
        } catch (\Throwable $th) {
            $response["title"] = "Error";
            $response["error"] = true;
            $response["subtitle"] = "Hubo un error, contactarse con nosotros.";
            // $response["subtitle"] = $th->getMessage();
            $response["type"] = 2;
        }
        ////////

        
        // RESPUESTA
        return response()->json($response, 200);
        ////////
    }

    public function paypalTrigger($enterprise, $membership, &$response)
    {
        $paypal_params = [
            "value" => $membership->price,
            "currency" => "usd",
            "custom_id" => $enterprise->id,
            "reference_id" => $membership->id,
        ];
        $response["url"] = app('App\Http\Controllers\Web\PayPalController')->payment_url($paypal_params);
        $response["subtitle"] = "Proceda a realizar el pago";
    }
}
