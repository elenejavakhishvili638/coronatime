<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\CovidData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch COVID data from API and store in database';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $countries = Http::get('https://devtest.ge/countries')->json();

        foreach ($countries as $country) {
            $statistics = Http::post('https://devtest.ge/get-country-statistics', [
                'code' => $country['code']
            ])->json();

            CovidData::updateOrCreate(
                ['code' => $country['code']],
                [
                    'name' => $country['name'],
                    'confirmed' => $statistics['confirmed'],
                    'deaths' => $statistics['deaths'],
                    'recovered' => $statistics['recovered']
                ]
            );
        }

        $this->info('COVID data fetched and stored in database.');
    }
}
