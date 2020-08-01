<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\EnterpriseRepository as Enterprise;

class EnterpriseController extends Controller
{
    protected $enterprise;

    public function __construct(Enterprise $enterprise) {
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
            'details.required' => 'Los detalles son obligatorios.',
            'schedule.required' => 'El horario es obligatorio.',
            'portrait_image.required' => 'La imagen es obligatoria.',
            'portrait_image.image' => 'Tiene que ser una imagen válida.',
            'portrait_image.mimes' => 'Use un formato válido jpg, jpeg ,png.',
            'portrait_image.max' => 'La imagen máximo puede pesar :max kb.',
        ];

        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'website' => 'required',
            'phone' => 'required',
            'details' => 'required',
            'schedule' => 'required',
            'portrait_image' => 'required|image|mimes:jpg,png|max:800'
            // 'address' => 'required',
        ];

        if(request('id')) {
            $rules["portrait_image"] = 'image|mimes:jpg,png|max:800';
        }

        request()->validate($rules, $messages);
        ////////

        // REGISTRO | ACTUALIZACION
        $data = request()->all();
        $response = [
            "error" => FALSE,
            "type" => 1,
            "title" => "OK",
            "subtitle" => "Empresa creada correctamente",
        ];
        $model = $this->enterprise->createUpdate($data);
        if(!$model->wasRecentlyCreated) {
            $response["subtitle"] = "Empresa actualizada correctamente";
        }
        ////////

        // RESPUESTA
        return response()->json($response,200);
        ////////
    }

    public function list()
    {
        $records = $this->enterprise->list();

        return response()->json($records,200);
    }

    public function find()
    {
        $id = request('id');
        $fields = ['id','user_id','category_id','name','website','phone','details','schedule','portrait_image','address','address_object'];
        $model = $this->enterprise->find(request('id'),$fields);
        $model->portrait_image = asset('storage/' . $model->portrait_image);
        $response = [
            "model" => $model
        ];

        return response()->json($response,200);
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

        return response()->json($response,200);
    }

}
