<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('frontend.login');
    }

    public function login() {
        $messages = [
    		'email.required'	=> 'El usuario es obligatorio',
    		'password.required'	=> 'La contraseña es obligatoria'
    	];

    	$rules = [
    		'email'		=> 'required',
    		'password'	=> 'required'
    	];

        $this->validate(request(), $rules, $messages);

        if (Auth::attempt([
                'email'		=> request('email'),
                'password'	=> request('password')
            ], true)) {
            $type = 3;
            $title = 'Ok!';
            $msg = 'Bienvenido, ' . Auth::user()->name;
            $url = route('frontend.directory');
        } else {
            $type = 2;
            $title = "Error!";
            $msg = "Verifique los datos ingresados";
            $url = "";
        }

        return response()->json([
            'type'  => $type,
            'title' => $title,
            'msg'   => $msg,
            'url'   => $url
        ], 200);
    }

    public function register() {
        return view('frontend.register');
    }

    public function newUser() {
        $messages = [
    		'name.required'         => 'El Nombre es obligatorio',
    		'email.required'        => 'El Usuario es obligatorio',
    		'password.required'     => 'La Contraseña es obligatoria',
    		'password.confirmed'    => 'Las Contraseñas no coinciden',
    	];

    	$rules = [
    		'name'      => 'required',
    		'email'     => 'required',
    		'password'  => 'required|confirmed',
    	];

        $this->validate(request(), $rules, $messages);

        $data = request()->all();
        unset($data['password_confirmation']);

        $user = User::updateOrCreate($data);
        $user->roles()->sync(3);

        $type = 3;
        $title = 'Ok!';
        $msg = 'Registro creado exitosamente';
        $url = route('frontend.login');

        return response()->json([
            'type'  => $type,
            'title' => $title,
            'msg'   => $msg,
            'url'   => $url
        ], 200);
    }
}
