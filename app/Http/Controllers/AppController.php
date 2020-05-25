<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use URL;

class AppController extends Controller
{

    public function setLanguage($lang='en'){
        $langArray=['tr','en'];
        $lang=(!in_array($lang,$langArray)) ?'en':$lang;
        Session::put('lang',$lang);
        return redirect(url(URL::previous()));
    }
}
