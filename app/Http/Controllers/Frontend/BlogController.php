<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $posts = Blog::all();
        $video = Video::first();

        return view('frontend.blog')->with(compact('posts', 'video'));
    }

    public function post( $slug = null ) {
        $post = Blog::where('slug', $slug)->first();

        return view('frontend.blog.post')->with(compact('post'));
    }
}
