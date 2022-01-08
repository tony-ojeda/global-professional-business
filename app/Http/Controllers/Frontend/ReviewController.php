<?php

namespace App\Http\Controllers\Frontend;

use App\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() {
        
        $testimonials = Testimonial::all();
        return view('frontend.reviews')->with(compact('testimonials'));
    }
}
