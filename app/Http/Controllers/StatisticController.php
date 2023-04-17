<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CovidData;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function showWorldwide()
    {

        $sumConfirmed = CovidData::sum('confirmed');
        $sumDeaths = CovidData::sum('deaths');
        $sumRecovered = CovidData::sum('recovered');

        return view('dashboard.worldwide', [

            'sumConfirmed' => rtrim(number_format($sumConfirmed, 3), '.0'),
            'sumDeaths' =>  rtrim(number_format($sumDeaths, 3), '.0'),
            'sumRecovered' =>  rtrim(number_format($sumRecovered, 3), '.0')
        ]);
    }

    public function showByCountry()
    {

        $sumConfirmed = CovidData::sum('confirmed');
        $sumDeaths = CovidData::sum('deaths');
        $sumRecovered = CovidData::sum('recovered');

        return view('dashboard.byCountry', [
            'countries' => Country::all(),
            'sumConfirmed' => rtrim(number_format($sumConfirmed, 3), '.0'),
            'sumDeaths' =>  rtrim(number_format($sumDeaths, 3), '.0'),
            'sumRecovered' =>  rtrim(number_format($sumRecovered, 3), '.0')
        ]);
    }
}
