<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;


class LanguangeController extends Controller
{

    public function set_locale()
    {
        $lang = $_POST['lang'];
        Session::put('lang', $lang);

        return 'success';
    }

}