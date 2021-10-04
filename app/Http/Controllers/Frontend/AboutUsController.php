<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index() {
        return view('frontend.about_us');
    }

    public function post( $slug = null ) {
        $post = Blog::where('slug', $slug)->first();

        return view('frontend.blog.post')->with(compact('post'));
    }
}
