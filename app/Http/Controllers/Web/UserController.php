<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
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
}
