<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function switchLang(Request $request): RedirectResponse
    {

        $request->session()->put('locale', $request->locale);
        return back();
    }
}
