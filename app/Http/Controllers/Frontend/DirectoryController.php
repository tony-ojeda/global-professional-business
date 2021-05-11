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
    public function index()
    {
        $categories = Category::all();
        $enterprises = Enterprise::leftjoin('categories', 'enterprises.category_id', '=', 'categories.id')
            ->select('enterprises.id', 'portrait_image', 'enterprises.name as enterprise_name', 'enterprises.slug', 'categories.name as category_name', 'enterprises.address as enterprise_address', 'enterprises.address_object')
            ->currentPayment()
            ->with(['images'])
            ->get();

        $enterprises->map(function ($item, $key) {
            $item->portrait_image = asset('storage/'.$item->portrait_image);
        });

        $params = request()->only(['name']);

        return view('frontend.directory')->with(compact('categories', 'enterprises','params'));
    }

    public function myBusiness()
    {
        return view('frontend.directory.my_business');
    }

    public function newBusiness($enterprise_id = null)
    {
        $enterprise = null;
        if (!is_null($enterprise_id)) {
            $enterprise = $this->getEnterprise($enterprise_id);
            if (is_null($enterprise)) {
                return redirect()->route('frontend.directory.register');
            }
        }

        $categories = Category::select('id', 'name')->get();

        return view('frontend.directory.new_business')->with(compact('categories', 'enterprise'));
    }

    public function business( $slug = null )
    {
        $enterprise = Enterprise::where('slug', $slug)->first();

        return view('frontend.directory.business')->with(compact('enterprise'));
    }

    public function sendMessage()
    {
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

    public function getEnterprise($enterprise_id)
    {
        $where = [
            ['user_id', '=' ,request()->user()->id]
        ];
        $with = [
            'memberships' => static function ($query) {
                $query->select('id', 'enterprise_id', 'membership_id', 'due_date')
                    ->whereNotNull('due_date')
                    ->with('membership')
                    ->orderBy('due_date', 'desc')
                    ->first();
            },
            'images' => static function($query) {
                $query->select('id','enterprise_id','url_image','position');
                $query->orderBy('position','asc');
            }
        ];

        $enterprise = app('App\Repositories\EnterpriseRepository')->find($enterprise_id, '*', $with, $where);
        $enterprise->portrait_image = $this->getCorrectImage($enterprise->portrait_image);
        $enterprise->images->map(function ($item, $key) {
            $item->url_image = $this->getCorrectImage($item->url_image);
            return $item;
        });

        return $enterprise;
    }

    public function getCorrectImage($image)
    {
        return is_null($image) ? '' : asset('storage/'. $image);
    }
}
