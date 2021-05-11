<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\EnterpriseRepository as Enterprise;

class EnterpriseController extends Controller
{
    protected $enterprise;

    public function __construct(Enterprise $enterprise)
    {
        $this->enterprise = $enterprise;
    }

    public function controller()
    {
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
            // 'website' => 'required',
            // 'phone' => 'required',
            // 'email' => 'required',
            // 'details' => 'required',
            // 'schedule' => 'required',
            'portrait_image' => 'image|mimes:jpg,jpeg,png|max:800'
            // 'address' => 'required',
        ];

        if (request('id')) {
            $rules["portrait_image"] = 'image|mimes:jpg,jpeg,png|max:800';
        }

        request()->validate($rules, $messages);
        ////////

        // REGISTRO | ACTUALIZACION
        $data = request()->all();
        $response = [
            "error" => false,
            "type" => 1,
            "title" => "OK",
            "subtitle" => "Empresa creada correctamente",
            // "reload" => 1
        ];
        $model = $this->enterprise->createUpdate($data);
        if (!$model->wasRecentlyCreated) {
            $response["subtitle"] = "Empresa actualizada correctamente";
        }
        ////////

        // RESPUESTA
        return response()->json($response, 200);
        ////////
    }

    public function list()
    {
        $records = $this->enterprise->list();

        return response()->json($records, 200);
    }

    public function find()
    {
        $id = request('id');
        $fields = ['id','user_id','category_id','name','website','phone', 'email','details','schedule','portrait_image','address','address_object'];
        $with = [
            'images' => static function ($query) {
                $query->select('id', 'enterprise_id', 'url_image', 'position');
                $query->orderBy('id', 'asc');
            }
        ];
        $model = $this->enterprise->find(request('id'), $fields, $with);
        $model->portrait_image = asset('storage/' . $model->portrait_image);
        $model->images->map(static function ($item, $index) {
            $item->url_image = asset('storage/' . $item->url_image);
            return $item;
        });

        $response = [
            "model" => $model
        ];

        return response()->json($response, 200);
    }

    public function delete()
    {
        $id = request('id');
        $flag = $this->enterprise->delete(request('id'));
        $response = [
            'error' => !$flag,
            'type' => 1,
            'title' => "OK!",
            'subtitle' => "Empresa eliminada correctamente",
            'url' => ""
        ];

        return response()->json($response, 200);
    }
}
