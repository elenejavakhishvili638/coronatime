<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FetchDataCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_fetch_data_command()
    {
        Http::fake([
            'https://devtest.ge/countries' => Http::response([
                ['code' => 'US', 'name' => ['en' => 'United States', 'ka' => 'ამერიკის შეერთებული შტატები']],
                ['code' => 'CA', 'name' => ['en' => 'Canada', 'ka' => 'კანადა']],
            ]),
            'https://devtest.ge/get-country-statistics' => Http::sequence()
                ->push([
                    'confirmed' => 1000,
                    'deaths' => 50,
                    'recovered' => 900,
                ])
                ->push([
                    'confirmed' => 500,
                    'deaths' => 20,
                    'recovered' => 450,
                ]),
        ]);


        $this->artisan('fetch:data')
            ->expectsOutput('COVID data fetched and stored in database.');

        $this->assertDatabaseHas('covid_data', [
            'code' => 'US',
            'name' => json_encode(['en' => 'United States', 'ka' => 'ამერიკის შეერთებული შტატები']),
            'confirmed' => 1000,
            'deaths' => 50,
            'recovered' => 900,
        ]);

        $this->assertDatabaseHas('covid_data', [
            'code' => 'CA',
            'name' => json_encode(['en' => 'Canada', 'ka' => 'კანადა']),
            'confirmed' => 500,
            'deaths' => 20,
            'recovered' => 450,
        ]);
    }
}
