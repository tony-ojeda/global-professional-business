<?php 

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class MenuComposer {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menus = [
            [
                "url" => "admin.home",
                "name" => "Inicio",
                "slug" => "inicio",
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
                ],
                [
                    "url" => "admin.categories",
                    "name" => "Categorías",
                    "slug" => "categorias",
                    "icon" => "feather icon-home",
                ],
                [
                    "url" => "admin.enterprises",
                    "name" => "Empresas",
                    "slug" => "empresas",
                    "icon" => "feather icon-home",
                ],
                [
                    "url" => "admin.blog",
                    "name" => "Blog",
                    "slug" => "blog",
                    "icon" => "feather icon-home",
                ],
                [
                    "url" => "admin.testimonials",
                    "name" => "Testimoniales",
                    "slug" => "testimoniales",
                    "icon" => "feather icon-home",
                ]
        ];
        $view->with('menus', $menus);
    }

}
