<?php

namespace App\Http\Controllers;

use Auth;
use Input;
use Image;
use Redirect;
use Validator;


class MemberController extends Controller
{

    public function upload_profile_pic()
    {
        //Validate Start
        $rules = array(
            'image'             => 'image|required',
        );

        $validator = Validator::make(Input::all(), $rules);
        //Validation End

        $image = Input::file('image');

        if ($validator->fails()) {

            return Redirect::to('members/personal-info')
                ->withErrors($validator)
                ->withInput(Input::except('password'));

        } else {

            $filename = time() . Auth::user()->id . '.' . $image->getClientOriginalExtension();

            $path = public_path('profiles/' . $filename);


            Image::make($image->getRealPath())->fit(100)->save($path);

            $user = Auth::user();
            $user->profile_pic = $filename;
            $user->save();

            return Redirect::to('members/personal-info')->with('message', trans('front.verified_success_logged_in'));

        }
    }

    public function personal_info()
    {
        //Validate Start
        $rules = array(
            'firstname'             => 'required',
            'lastname'             => 'required',
            'country'             => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        //Validation End

        $firstname = Input::file('firstname');
        $lastname = Input::file('lastname');
        $gender = Input::file('gender');
        $address = Input::file('address');
        $city = Input::file('city');
        $zipcode = Input::file('zipcode');
        $state = Input::file('state');
        $country = Input::file('country');

        if ($validator->fails()) {

            return Redirect::to('members/personal-info')
                ->withErrors($validator)
                ->withInput();

        } else {

            $user = Auth::user();
            $user->firstname = $firstname;
            $user->lastname = $lastname;
            $user->gender = $gender;
            $user->address = $address;
            $user->city = $city;
            $user->zipcode = $zipcode;
            $user->state = $state;
            $user->country_code = $country;
            $user->save();

            return Redirect::to('members/personal-info')->with('message', 'shdsaj haskdjahsdkjahsdas');

        }
    }

}