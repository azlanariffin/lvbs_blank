<?php

namespace App\Http\Controllers;

use Auth;



class MemberViewController extends Controller
{

    public function home()
    {
        return view('member.home');
    }

    public function template()
    {
        return view('member.home_temp');
    }

    public function personal_info()
    {
        return view('member.personal_info');
    }

}