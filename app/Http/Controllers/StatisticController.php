<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CovidData;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatisticController extends Controller
{
    public function showWorldwide(): View
    {

        $sumConfirmed = CovidData::sum('confirmed');
        $sumDeaths = CovidData::sum('deaths');
        $sumRecovered = CovidData::sum('recovered');

        return view('dashboard.worldwide', [
            'sumConfirmed' => number_format($sumConfirmed, 3),
            'sumDeaths' =>  number_format($sumDeaths, 3),
            'sumRecovered' =>  number_format($sumRecovered, 3),
        ]);
    }

    public function showByCountry(): View
    {
        $sumConfirmed = CovidData::sum('confirmed');
        $sumDeaths = CovidData::sum('deaths');
        $sumRecovered = CovidData::sum('recovered');

        return view('dashboard.byCountry', [
            'countries' => CovidData::query()->filter(request(['search', 'sort_by', 'sort_order']))->get(),
            'sumConfirmed' => number_format($sumConfirmed, 3),
            'sumDeaths' =>  number_format($sumDeaths, 3),
            'sumRecovered' =>  number_format($sumRecovered, 3),
        ]);
    }
}
