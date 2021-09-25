<?php

namespace App\Http\Controllers\Frontend;

use App\CountryList;
use App\Enterprise;
use App\EnterpriseImage;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index() {
        $countries = CountryList::orderBy('name')->get();
        $testimonials = Testimonial::all();
        $enterprises = Enterprise::all();

        $enterpriseImages = [];

        $enterprises->map(function ($item, $index) use (&$enterpriseImages) {
            $enterprise_id = $item->id;
            $modelImage = EnterpriseImage::where('enterprise_id',$enterprise_id)->select('id','url_image')->orderBy('id','asc')->first();
            $enterpriseImages[] = $modelImage;

            return $item;
        });

		return view('frontend.index')->with(compact('countries', 'testimonials', 'enterprises','enterpriseImages'));
	}

    public function sendMessage() {
        $messages = [
			'business_name.required'    => 'Company name is required.',
			'full_name.required'        => 'Full name is required.',
			'email.required'            => 'Email is required.',
			'phone.required'            => 'Phone number is required.',
			'website.required'          => 'URL is required. (NA if you do not have)',
			'message.required'          => 'Message is required.',
			'country.required'          => 'Country is required.',
		];

		$rules = [
			'business_name' => 'required',
			'full_name'     => 'required',
			'email'         => 'required',
			'phone'         => 'required',
			'website'       => 'required',
			'message'       => 'required',
			'country'       => 'required',
		];

		request()->validate($rules, $messages);

        $mail_info = request()->all();

        Mail::to('gabriel@codea.pe')
            ->send(new ContactMail($mail_info));
    }

    public function privacyPolicy() {
        return view('frontend.privacy_policy');
    }

    public function termsConditions() {
        return view('frontend.terms_and_conditions');
    }
}
