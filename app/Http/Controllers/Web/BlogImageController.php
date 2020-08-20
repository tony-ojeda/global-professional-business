<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BlogImageRepository as BlogImage;
use App\Rules\Base64;


class BlogImageController extends Controller
{
    protected $blogImage;

    public function __construct(BlogImage $blogImage) {
        $this->blogImage = $blogImage;
    }

    public function controller()
    {
        $data = request()->all();

        //VALIDACIONES
        $messages = [
            'image.required' => 'Imagen obligatoria'
        ];

        $rules = [
            'image' => ['required',new Base64(['jpg','jpeg','png'])],
        ];

        request()->validate($rules,$messages);
        //////////////

        //INICIALIZACION
        $response = [
            'error' => TRUE,
            'type' => 2,
            'title' => 'Error',
            'subtitle' => ''
        ];
        //////////////

        //CREACION|ACTUALIZACION
        try {
            $url = $this->blogImage->saveImage($data["image"]);
            $response["error"] = FALSE;
            $response["url"] = asset('storage/'.$url);
        } catch (\Throwable $th) {
            //throw $th;
            $response["subtitle"] = $th->getMessage();
            // $response["subtitle"] = "Error";
        }
        //////////////

        //RESPUESTA
        return response()->json($response,200);
        //////////////
    }
}
