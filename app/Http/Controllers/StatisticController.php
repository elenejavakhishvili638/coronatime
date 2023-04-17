<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function showWorldwide()
    {
        return view('dashboard.worldwide');
    }

    public function showByCountry()
    {
        return view('dashboard.byCountry');
    }
}
