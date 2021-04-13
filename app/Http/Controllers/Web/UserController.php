<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {
    	$messages = [
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'Escriba un correo válido',
            'password.required' => 'La clave es obligatoria',
        ];

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        request()->validate($rules, $messages);

        $response = [
            'error' => TRUE,
	    	'type' => 2,
	    	'title' => "Error!",
	    	'subtitle' => "Verifique los datos ingresados",
            'url' => "",
            'reload' => NULL
        ];


        if (
            Auth::attempt(
                [
                    'email' => request('email'),
                    'password' => request('password')
                ],true
            )
        ){
        	$response["error"] = FALSE;
        	$response["type"] = 3;
        	$response["title"] = "OK!";
        	$response["subtitle"] = "Bienvenido, " . Auth::user()->name;
        	$response["url"] = route("admin.home");
        }


        return response()->json($response,200);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }

    public function controller()
    {
        $id = request('id');
        // VALIDACIONES
        $messages = [
            'role_id.required' => 'El rol es obligatorio.',
            'name.required' => 'El nombre completo es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.unique' => 'Este email ya está registrado.',
            'password.required' => 'La clave es obligatoria.'
        ];

        $rules = [
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email,'. NULL .',id,deleted_at,NULL',
            'password' => 'required'
        ];

        if(!is_null($id)){
            $rules['email'] = 'required|email|unique:users,email,'. $id .',id,deleted_at,NULL';
            unset($rules["password"]);
        }

        request()->validate($rules, $messages);
        ///////////////

        // REGISTRO | ACTUALIZACION
        $data = request()->all();
        $response = [
            "error" => FALSE,
            "type" => 1,
            "title" => "OK",
            "subtitle" => "Usuario creado correctamente",
        ];
        $model = $this->userRepository->createUpdate($data);
        if(!$model->wasRecentlyCreated) {
            $response["subtitle"] = "Usuario actualizado correctamente";
        }
        ////////

        // RESPUESTA
        return response()->json($response,200);
        ////////
    }

    public function list()
    {
        $records = $this->userRepository->list();
        return response()->json($records,200);
    }

    public function find()
    {
        $id = request('id');
        $fields = ['id','name','email'];
        $with = [
            'roles' => static function($query) {
                $query->select('roles.id','roles.name');
            }
        ];
        $model = $this->userRepository->find(request('id'),$fields,$with);
        $model->role_id = $model->roles[0]->id;
        $response = [
            "model" => $model
        ];

        return response()->json($response,200);
    }

    public function delete()
    {
        $id = request('id');
        $flag = $this->userRepository->delete(request('id'));
        $response = [
            'error' => !$flag,
            'type' => 1,
            'title' => "OK!",
            'subtitle' => "Usuario eliminado correctamente",
            'url' => ""
        ];

        return response()->json($response,200);
    }

}
