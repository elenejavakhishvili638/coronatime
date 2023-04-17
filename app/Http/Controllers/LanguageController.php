<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLang(Request $request)
    {

        $request->session()->put('locale', $request->locale);
        return back();
    }
}
