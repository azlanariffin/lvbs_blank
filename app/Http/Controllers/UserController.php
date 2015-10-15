<?php

namespace App\Http\Controllers;

use Auth;
use Input;
use Validator;
use Redirect;
use Hash;
use AppHelper;
use App\User;
use Socialite;

class UserController extends Controller
{

    public function login()
    {
        //Validate Start
        $rules = array(
            'email'             => 'email|required',
            'password'         => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        //Validation End

        //Declare Input Variables
        $email = Input::get('email');
        $password = Input::get('password');
        $rememberme = Input::get('rememberme');

        if ($validator->fails()) {

            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));

        } else {

            //Handle Remember Me Features
            if($rememberme=='1')
            { $remember = 'true'; } else { $remember = 'false';}

            //Handle Login Credentials
            if(Auth::attempt(array('email' => $email, 'password' => $password), $remember))
            {
                //Check if email verified
                if(Auth::user()->email_verify_status < 1)
                {
                    return Redirect::to('verify-email')->with('email', $email);
                }
                else
                {
                    return Redirect::to('members/home');
                }
            }
            else
            {
                return Redirect::to('login')
                    ->withErrors(trans('auth.failed'))
                    ->withInput(Input::except('password'));
            }
        }
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        return $user->token;
    }

    public function generate_email_verification()
    {
        $code = md5(substr(str_shuffle("abcdefghijk" . rand(111111, 999999) . "lmnopqrstuvwxyz"), 0, 15));
        $user = User::where('email_verify_code', '=', $code)->first();
        if (count($user) > 0)
        {
            return self::generate_email_verification($type);
        } else {
            return $code;
        }
    }

    public function signup()
    {

        //Validate Start
        $rules = array(
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'repassword' => 'required|same:password'
        );

        $validator = Validator::make(Input::all(), $rules);
        //Validation End

        //Declare Input Variables
        $email = Input::get('email');
        $password = Input::get('password');

        if ($validator->fails()) {

            return Redirect::to('signup')
                ->withErrors($validator)
                ->withInput(Input::except('password', 'repassword'));

        } else {

            //Generate and validate email verification code
            $emailverificationcode = $this->generate_email_verification();
            $password = Hash::make($password);

            $user = new User();
            $user->email = strtolower($email);
            $user->email_verify_code = $emailverificationcode;
            $user->user_type_id = '3';
            $user->password = $password;
            $user->alias = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 8);
            $user->save();

            return Redirect::to('notice')->with('email', $email);

        }
    }

    public function verify_email()
    {
        //Validate Start
        $rules = array(
            'code' => 'required',
            'email' => 'email|required'
        );

        $messages = array(
            'email' => trans('front.email_wrong_format'),
            'required' => trans('front.the_is_required')
        );

        $inputnames = array(
            'code' => trans('front.verification_code'),
            'email' => trans('front.email')
        );

        $validator = Validator::make(Input::all(), $rules, $messages);
        $validator->setAttributeNames($inputnames);
        //Validation End

        //Declare Input Variables
        $code = Input::get('code');
        $email = Input::get('email');

        if ($validator->fails()) {

            return Redirect::to('verify-email')
                ->withErrors($validator)
                ->withInput()
                ->with('email',Input::get('email'));

        } else {
            //Check if verification code match
            $verificationcode = User::where('email','=',$email)->first();
            if($code==$verificationcode->email_verify_code)
            {
                //Update email_verify_status
                $verificationcode->email_verify_status = '1';
                $verificationcode->save();

                return Redirect::to('members/home')->with('message',trans('front.verified_success_logged_in'));
            }
            else
            {
                return Redirect::to('verify-email')
                    ->withErrors(trans('front.verification_code_not_valid'))
                    ->with('email',Input::get('email'));
            }
        }
    }

    public function logout()
    {
        if (Auth::check())
        {
            $this->setUserOffline();
            Auth::logout();
            return Redirect::to('login')->with('message', 'You have logged out!');
        }
        else
        {
            return Redirect::to('login');
        }
    }

    public function setUserOffline() {
      $user_id = Auth::user()->id;
      $user = User::find($user_id);
      $user->active = 0;
      $user->save();
    }

}