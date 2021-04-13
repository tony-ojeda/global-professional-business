<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Enterprise;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        $enterprises = Enterprise::leftjoin('categories', 'enterprises.category_id', '=', 'categories.id')
            ->select('enterprises.id', 'portrait_image', 'enterprises.name as enterprise_name', 'categories.name as category_name', 'enterprises.address as enterprise_address' )
            ->get();

        $enterprises->map(function ($item, $key) {
            $item->portrait_image = asset('storage/'.$item->portrait_image);
        });

        return view('frontend.directory')->with(compact('categories', 'enterprises'));
    }

    public function newBusiness() {

    }
}
