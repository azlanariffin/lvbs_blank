<?php

namespace App\Http\Controllers;

use Auth;


class MemberViewController extends Controller
{

    public function home()
    {
    	if (Auth::check()) {
    		//echo "<script>alert('authenticated')</script>";
    	}
    	else {
    		//echo "<script>alert('not authenticated')</script>";
    	}
        return view('member.home');
    }

    public function template()
    {
        return view('member.home_temp');
    }

}