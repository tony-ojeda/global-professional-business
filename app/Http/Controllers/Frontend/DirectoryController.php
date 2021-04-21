<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Enterprise;
use App\Http\Controllers\Controller;
use App\Mail\DirectoryContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function myBusiness() {
        return view('frontend.directory.my_business');
    }

    public function listMyBusiness() {
        $enterprises = Enterprise::leftjoin('categories', 'enterprises.category_id', '=', 'enterprises.category_id')
            ->where('enterprises.user_id', Auth::user()->id)
            ->select('enterprises.id', 'website', 'address', 'categories.name as category_name', 'phone')
            ->get();

        return $enterprises;
    }

    public function newBusiness() {
        $categories = Category::select('id', 'name')->get();

        return view('frontend.directory.new_business')->with(compact('categories'));
    }

    public function business() {
        return view('frontend.directory.business');
    }

    public function sendMessage() {
        $messages = [
			'message.required'          => 'Mensaje es obligatorio.',
		];

		$rules = [
			'message'       => 'required',
		];

		request()->validate($rules, $messages);

        $mail_info = request()->all();
        $mail_info['name'] = Auth::user()->name;
        $mail_info['email'] = Auth::user()->email;
        $mail_info['phone'] = Auth::user()->phone;

        Mail::to('gabriel@codea.pe')
            ->send(new DirectoryContactMail($mail_info));
    }
}
