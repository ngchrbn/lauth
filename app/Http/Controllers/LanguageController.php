<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($language): \Illuminate\Http\RedirectResponse
    {
        if (array_key_exists($language, Config::get('languages')))
        {
            Session::put('applocale', $language);
        }
        return redirect()->back();
    }
}
