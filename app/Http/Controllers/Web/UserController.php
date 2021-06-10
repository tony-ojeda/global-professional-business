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
            'email.required' => 'Email is required',
            'email.email' => 'Enter a valid email',
            'password.required' => 'Password is required',
        ];

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        request()->validate($rules, $messages);

        $response = [
            'error' => true,
            'type' => 2,
            'title' => "Error!",
            'subtitle' => "Verify the data entered",
            'url' => "",
            'reload' => null
        ];


        if (
            Auth::attempt(
                [
                    'email' => request('email'),
                    'password' => request('password')
                ],
                true
            )
        ) {
            $response["error"] = false;
            $response["type"] = 3;
            $response["title"] = "OK!";
            $response["subtitle"] = "Welcome, " . Auth::user()->name;
            $response["url"] = route("admin.home");
        }


        return response()->json($response, 200);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('frontend.index');
    }

    public function controller()
    {
        $id = request('id');
        // VALIDACIONES
        $messages = [
            'role_id.required' => 'The role is required.',
            'name.required' => 'Full name is required.',
            'email.required' => 'Email is required.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.'
        ];

        $rules = [
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email,'. null .',id,deleted_at,NULL',
            'password' => 'required'
        ];

        if (!is_null($id)) {
            $rules['email'] = 'required|email|unique:users,email,'. $id .',id,deleted_at,NULL';
            unset($rules["password"]);
        }

        request()->validate($rules, $messages);
        ///////////////

        // REGISTRO | ACTUALIZACION
        $data = request()->all();
        $response = [
            "error" => false,
            "type" => 1,
            "title" => "OK",
            "subtitle" => "User successfully created",
        ];
        $model = $this->userRepository->createUpdate($data);
        if (!$model->wasRecentlyCreated) {
            $response["subtitle"] = "User updated correctly";
        }
        ////////

        // RESPUESTA
        return response()->json($response, 200);
        ////////
    }

    public function list()
    {
        $records = $this->userRepository->list();
        return response()->json($records, 200);
    }

    public function find()
    {
        $id = request('id');
        $fields = ['id','name','email'];
        $with = [
            'roles' => static function ($query) {
                $query->select('roles.id', 'roles.name');
            }
        ];
        $model = $this->userRepository->find(request('id'), $fields, $with);
        $model->role_id = $model->roles[0]->id;
        $response = [
            "model" => $model
        ];

        return response()->json($response, 200);
    }

    public function delete()
    {
        $id = request('id');
        $flag = $this->userRepository->delete(request('id'));
        $response = [
            'error' => !$flag,
            'type' => 1,
            'title' => "OK!",
            'subtitle' => "User successfully deleted",
            'url' => ""
        ];

        return response()->json($response, 200);
    }


    public function recoverPassword()
    {
        $messages = [
            'email.required' => 'Email is required'
        ];

        $rules = [
            'email' => 'required'
        ];

        request()->validate($rules, $messages);

        $email = request('email');

        $error = false;
        $msg = "Your password has been restored and sent to your email address.";
        try {
            $model = $this->userRepository->recoverPassword($email);
            if (is_null($model)) {
                $error = true;
                $msg = "This email is not registered";
            }
        } catch (\Throwable $th) {
            $error = true;
            $msg = "Check that your email is valid";
        }

        $response = [
            'error' => $error,
            'msg' => $msg,
        ];

        return response()->json($response, 200);
    }
}
