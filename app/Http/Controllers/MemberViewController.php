<?php

namespace App\Http\Controllers;


class MemberViewController extends Controller
{

    public function home()
    {
        return view('member.home');
    }

    public function personal_info()
    {
        return view('member.personal_info');
    }

}