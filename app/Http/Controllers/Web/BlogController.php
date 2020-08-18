<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BlogRepository as Blog;

class BlogController extends Controller
{
    protected $blog;

    public function __construct(Blog $blog) {
        $this->blog = $blog;
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
            'portrait_image' => 'required|image|mimes:jpg,png|max:600',
            'content' => 'required'
        ];

        if(isset($data["id"]) && $data["id"] != '')
        {
            $rules["portrait_image"] = 'image|mimes:jpg,png|max:600';
        }
        
        request()->validate($rules,$messages);
        //////////////

        //INICIALIZACION
        $response = [
            'error' => TRUE,
            'type' => 2,
            'title' => 'Error',
            'subtitle' => ''
        ];
        
        $data["user_id"] = auth()->user()->id;
        //////////////

        //CREACION|ACTUALIZACION
        // try {
            $model = $this->blog->createUpdate($data);
            $response["error"] = FALSE;
            $response["type"] = 1;
            // $response["url"] = route('post.update',['id' => $model->id]);
            $response["title"] = "Ok";
            $response["subtitle"] = "Post actualizado correctamente";
            if($model->wasRecentlyCreated) {
                $response["subtitle"] = "Post creado correctamente";
            }
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     // $response["subtitle"] = $th->getMessage();
        //     $response["subtitle"] = "Error";
        // }
        //////////////

        //RESPUESTA
        return response()->json($response,200);
        //////////////
    }

    public function delete()
    {
        $id = request('id');
        $response = [
            'error' => TRUE,
            'type' => 2,
            'title' => 'Error',
        ];
        
        try {
            $this->blog->delete($id);
            $response = [
                'error' => FALSE,
                'type' => 3,
                'title' => 'Ok',
                'subtitle' => 'Entrada eliminada correctamente',
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
        $records = $this->blog->list();
        return response()->json($records);
    }

    public function find()
    {
        $id = request('id');
        $fields = ['id','title','portrait_image','content','visible'];
        $model = $this->blog->find(request('id'),$fields);

        $model->portrait_image = asset('storage/' . $model->portrait_image);
        $response = [
            "model" => $model
        ];

        return response()->json($response,200);
    }


    // FRONTEND DATA
    public function getCurrentPost($id)
    {
        $with = [
            'user' => static function($query) {
                $query->select('id','name');
            }
        ];
        $post = $this->blogRepository->find($id,'*',$with);
        if(is_null($post)) {
            return NULL;
        }

        $post->portrait_image = Storage::disk('public')->url($post->portrait_image);
        $post->published_date = date('M d, Y',strtotime($post->published_date));

        return $post;
    }

    public function getLatestPosts($quantity,$filters)
    {
        $with = [];

        $latest_posts = $this->blogRepository->getLatestPosts($quantity,'*',$with,$filters);
        $latest_posts->map(static function($item,$index) {
            $item->portrait_image = Storage::disk('public')->url($item->portrait_image);
            // $item->published_date = date('M d, Y',strtotime($item->published_date));
            // $item->href_view = route('posts.detail',['id' => $item->id, 'title' => Str::slug($item->title)]);
            return $item;
        });

        return $latest_posts;
    }
}
