<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Enterprise;
use App\EnterpriseImage;

class SearchController extends Controller
{
    public function index() {

        $categories = Category::all();
        $enterprises = Enterprise::leftjoin('categories', 'enterprises.category_id', '=', 'categories.id')
            ->select('enterprises.id', 'portrait_image', 'enterprises.name as enterprise_name', 'enterprises.slug', 'categories.name as category_name', 'categories.id as category_id', 'enterprises.address as enterprise_address', 'enterprises.address_object')
            ->currentPayment()
            ->with(['images'])
            ->get();

        $enterprises->map(function ($item, $key) {
            $item->portrait_image = asset('storage/'.$item->portrait_image);
        });

        $params = request()->only(['name']);

        return view('frontend.search')->with(compact('categories', 'enterprises', 'params'));
    }
}
