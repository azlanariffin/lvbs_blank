<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Html\HtmlFacade;

use App\User;
use Redirect;

class UserViewController extends Controller
{

    public function login()
    {
        return view('front.login');
    }

    public function signup()
    {
        return view('front.signup');
    }

    public function reset_password()
    {
        return view('front.reset_password');
    }

    public function verify_email()
    {
        if (Session::get('email')) {
            $user = User::where('email', '=', Session::get('email'))->first();
            if ($user->emailverifystatus < 1) {
                return view('front.verify_email');
            } else {
                return Redirect::to('login')->withErrors(trans('front.email_already_verified'));
            }
        } else {
            return Redirect::to('login')->withErrors(trans('front.please_check_your_email_verification'));
        }
    }

}