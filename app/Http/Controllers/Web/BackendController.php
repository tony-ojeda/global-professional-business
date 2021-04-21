<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Role;

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
                'name' => "Dashboardh"
            ],
            [
                'link' => '#',
                'name' => "Inicio"
            ]
        ];

        return view('backend.index',compact('breadcrumbs'));
    }

    public function login()
    {
        $breadcrumbs = [
            [
                'link' => '#',
                'name' => "Dashboard"
            ],
            [
                'name' => "Inicio"
            ]
        ];


        $menus = [
            [
                "url" => "",
                "name" => "Dashboard",
                "slug" => "dashboard",
                // "badge" => "2",
                // "badgeClass" => "badge badge-warning badge-pill float-right mr-2",
                "icon" => "feather icon-home"
            ]
        ];
        return view('vuexy_login.login');
    }


    public function users()
    {
        $breadcrumbs = [
            [
                'link' => '#',
                'name' => "Dashboard"
            ],
            [
                'name' => "Usuarios"
            ]
        ];

        $roles = Role::where('id','>',1)->get(['id','name']);

        return view('backend.users',compact('breadcrumbs','roles'));
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

    public function blog()
    {
        $breadcrumbs = [
            [
                'link' => '#',
                'name' => "Dashboard"
            ],
            [
                'link' => '#',
                'name' => "Blog"
            ],
            [
                'name' => "Noticias"
            ]
        ];

        return view('backend.blog',compact('breadcrumbs'));
    }

    public function testimonials()
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
                'name' => "Testimoniales"
            ]
        ];

        return view('backend.testimonials',compact('breadcrumbs'));
    }

    public function videos()
    {
        $breadcrumbs = [
            [
                'link' => '#',
                'name' => "Dashboard"
            ],
            [
                'link' => '#',
                'name' => "Blog"
            ],
            [
                'name' => "Videos"
            ]
        ];

        $videoRepository = app('App\Repositories\VideoRepository');
        $record = $videoRepository->getRecord();
        if( is_null($record) ) {
            $record = new \stdClass();
            $record->id = NULL;
            $record->video_1 = "";
            $record->video_2 = "";
        }

        return view('backend.videos',compact('breadcrumbs','record'));
    }
}
