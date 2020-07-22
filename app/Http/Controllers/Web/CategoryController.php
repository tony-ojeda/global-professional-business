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
}
