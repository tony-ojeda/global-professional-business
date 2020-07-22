<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository as Category;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function ct()
    {
        // VALIDACIONES
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
        ];

        $rules = [
            'name' => 'required',
        ];

        request()->validate($rules, $messages);
        ////////

        // REGISTRO | ACTUALIZACION
        $data = request()->all();
        $response = [
            "error" => FALSE,
            "type" => 1,
            "title" => "OK",
            "subtitle" => "Categoría creada correctamente",
        ];
        $model = $this->category->createUpdate($data);
        if(!$model->wasRecentlyCreated) {
            $response["subtitle"] = "Categoría actualizada correctamente";
        }
        ////////

        // RESPUESTA
        return response()->json($response,200);
        ////////
    }

    public function list()
    {
        $records = $this->category->list();

        return response()->json($records,200);
    }

    public function find()
    {
        $id = request('id');
        $fields = ['id','name'];
        $model = $this->category->find(request('id'),['id','name']);
        $response = [
            "model" => $model
        ];

        return response()->json($response,200);
    }

    public function delete()
    {
        $id = request('id');
        $flag = $this->category->delete(request('id'));
        $response = [
            'error' => !$flag,
            'type' => 1,
            'title' => "OK!",
            'subtitle' => "Categoría eliminada correctamente",
            'url' => ""
        ];

        return response()->json($response,200);
    }
}
