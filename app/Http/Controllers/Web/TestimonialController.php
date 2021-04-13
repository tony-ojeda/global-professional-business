<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TestimonialRepository as Testimonial;

class TestimonialController extends Controller
{
    protected $testimonial;

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function controller()
    {
        $data = request()->all();

        //VALIDACIONES
        $messages = [
            'title.required' => 'El título es obligatorio',
            'portrait_image.required' => 'La imagen es obligatoria.',
            'portrait_image.image' => 'Tiene que ser una imagen válida.',
            'portrait_image.mimes' => 'Use un formato válido jpg, jpeg ,png.',
            'portrait_image.max' => 'La imagen máximo puede pesar :max kb.',
            'content.required' => 'El contenido es obligatorio'
        ];

        $rules = [
            'title' => 'required',
            'portrait_image' => 'required|image|mimes:jpg,jpeg,png|max:600',
            'content' => 'required'
        ];

        if (isset($data["id"]) && $data["id"] != '') {
            $rules["portrait_image"] = 'image|mimes:jpg,jpeg,png|max:600';
        }
        
        request()->validate($rules, $messages);
        //////////////

        //INICIALIZACION
        $response = [
            'error' => true,
            'type' => 2,
            'title' => 'Error',
            'subtitle' => ''
        ];
        
        $data["user_id"] = auth()->user()->id;
        //////////////

        //CREACION|ACTUALIZACION
        try {
            $model = $this->testimonial->createUpdate($data);
            $response["error"] = false;
            $response["type"] = 1;
            // $response["url"] = route('post.update',['id' => $model->id]);
            $response["title"] = "Ok";
            $response["subtitle"] = "Testimonial actualizada correctamente";
            if ($model->wasRecentlyCreated) {
                $response["subtitle"] = "Testimonial creada correctamente";
            }
        } catch (\Throwable $th) {
            //throw $th;
            // $response["subtitle"] = $th->getMessage();
            $response["subtitle"] = "Error";
        }
        //////////////

        //RESPUESTA
        return response()->json($response, 200);
        //////////////
    }

    public function delete()
    {
        $id = request('id');
        $response = [
            'error' => true,
            'type' => 2,
            'title' => 'Error',
        ];
        
        try {
            $this->testimonial->delete($id);
            $response = [
                'error' => false,
                'type' => 3,
                'title' => 'Ok',
                'subtitle' => 'Testimonial eliminada correctamente',
                'sendEvent' => 1,
                'channel' => 'refresh'
            ];
        } catch (\Throwable $th) {
            $response["subtitle"] = "Ocurrió un error";
        }

        return response()->json($response);
    }

    public function list()
    {
        $records = $this->testimonial->list();
        return response()->json($records);
    }

    public function find()
    {
        $id = request('id');
        $fields = ['id','title','portrait_image','content'];
        $model = $this->testimonial->find(request('id'), $fields);

        $model->portrait_image = asset('storage/' . $model->portrait_image);
        $response = [
            "model" => $model
        ];

        return response()->json($response, 200);
    }
}
