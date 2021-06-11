<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\VideoRepository as Video;

class VideoController extends Controller
{
    protected $video;

    public function __construct(Video $video) {
        $this->video = $video;
    }

    public function controller()
    {
        $data = request()->all();

        //VALIDACIONES
        $messages = [
            'video_1.required' => 'El video es obligatorio',
            // 'video_2.required' => 'El video es obligatorio',
        ];

        $rules = [
            'video_1' => 'required',
            // 'video_2' => 'required',
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
            $model = $this->video->createUpdate($data);
            $response["error"] = FALSE;
            $response["type"] = 1;
            // $response["url"] = route('post.update',['id' => $model->id]);
            $response["title"] = "Ok!";
            $response["subtitle"] = "Videos actualizados correctamente";
            if($model->wasRecentlyCreated) {
                $response["subtitle"] = "Videos creados correctamente";
            }
            $response["reload"] = 1;
        } catch (\Throwable $th) {
            //throw $th;
            // $response["subtitle"] = $th->getMessage();
            $response["subtitle"] = "Error";
        }
        //////////////

        //RESPUESTA
        return response()->json($response,200);
        //////////////
    }

    public function find()
    {
        $id = request('id');
        $fields = ['id','video_1','video_2'];
        $model = $this->video->find(request('id'),$fields);

        $response = [
            "model" => $model
        ];

        return response()->json($response,200);
    }
}
