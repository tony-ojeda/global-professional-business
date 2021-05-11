<?php

namespace App\Http\Controllers\Frontend;

use App\CountryList;
use App\Enterprise;
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
        $enterprises = Enterprise::select('portrait_image')->get();

		return view('frontend.index')->with(compact('countries', 'testimonials', 'enterprises'));
	}

    public function sendMessage() {
        $messages = [
			'business_name.required'    => 'Nombre de la Empresa es obligatorio.',
			'full_name.required'        => 'Nombre completo es obligatorio.',
			'email.required'            => 'Correo electrónico es obligatorio.',
			'phone.required'            => 'Número de Teléfono es obligatorio.',
			'website.required'          => 'URL es obligatorio. (NA si no cuenta con una)',
			'message.required'          => 'Mensaje es obligatorio.',
			'country.required'          => 'País es obligatorio.',
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
