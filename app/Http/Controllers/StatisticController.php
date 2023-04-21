<?php

namespace App\Http\Controllers;


use App\Models\CovidData;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatisticController extends Controller
{
    public function showWorldwide(): View
    {
        return view('dashboard.worldwide', $this->getSumData());
    }

    public function showByCountry(): View
    {
        return view('dashboard.byCountry', array_merge([
            'countries' => CovidData::query()->filter(request(['search', 'sort_by', 'sort_order']))->get(),
        ], $this->getSumData()));
    }


    private function getSumData(): array
    {
        $sumConfirmed = CovidData::sum('confirmed');
        $sumDeaths = CovidData::sum('deaths');
        $sumRecovered = CovidData::sum('recovered');

        return [
            'sumConfirmed' => number_format($sumConfirmed, 3),
            'sumDeaths' => number_format($sumDeaths, 3),
            'sumRecovered' => number_format($sumRecovered, 3),
        ];
    }
}
