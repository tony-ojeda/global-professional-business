<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class BackendController extends Controller
{

    public function testing()
    {
        $paypal = new \App\Services\PayPalService();
        return $paypal->createOrder(50,'usd');
    }

    public function index()
    {
        $breadcrumbs = [
            [
                'link' => '#',
                'name' => "Home"
            ], 
            [
                'link' => '#',
                'name' => "Control de temperatura"
            ], 
            [
                'name' => "Registros"
            ]
        ];

        return view('backend.index',compact('breadcrumbs'));
    }

    public function login()
    {
        $breadcrumbs = [
            [
                'link' => '#',
                'name' => "Home"
            ], 
            [
                'link' => '#',
                'name' => "Control de temperatura"
            ], 
            [
                'name' => "Registros"
            ]
        ];


        $menus = [
            [
                "url" => "",
                "name" => "Dashboard",
                "slug" => "dashboard",
                // "badge" => "2",
                // "badgeClass" => "badge badge-warning badge-pill float-right mr-2",
                "icon" => "feather icon-home",
                // "submenu" => [
                //     [
                //         "url" => 'home',
                //         "name" => "Control de temperatura",
                //         "icon" => "feather icon-circle",
                //     ],
                //     // [
                //     //     "url" => "",
                //     //     "name" => "ngGrid",
                //     //     "icon" => "feather icon-circle",
                //     // ]
                // ]
            ]
        ];
        return view('vuexy_login.login',compact('breadcrumbs','menus'));
    }

    public function categories()
    {
        $breadcrumbs = [
            [
                'link' => '#',
                'name' => "Dashboard"
            ], 
            [
                'link' => '#',
                'name' => "Módulos"
            ], 
            [
                'name' => "Categorías"
            ]
        ];

        return view('backend.categories',compact('breadcrumbs'));
    }

    public function enterprises()
    {
        $breadcrumbs = [
            [
                'link' => '#',
                'name' => "Dashboard"
            ], 
            [
                'link' => '#',
                'name' => "Módulos"
            ], 
            [
                'name' => "Empresas"
            ]
        ];

        $categories = Category::all(['id','name']);

        return view('backend.enterprises',compact('breadcrumbs','categories'));
    }
}
