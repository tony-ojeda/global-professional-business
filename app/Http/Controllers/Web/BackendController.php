<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
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
        return view('backend.index',compact('breadcrumbs','menus'));
    }
}
