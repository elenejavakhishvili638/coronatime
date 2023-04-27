<?php

namespace Tests\Feature;

use App\Models\CovidData;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    protected $covidData1;
    protected $covidData2;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);

        $this->covidData1 = CovidData::factory()->create([
            'name' => [
                'en' => 'searchterm',
                'ka' => 'საძიებო ტერმინი',
            ],
            'confirmed' => 100,
            'deaths' => 10,
            'recovered' => 90,
        ]);

        $this->covidData2 = CovidData::factory()->create([
            'name' => [
                'en' => 'other',
                'ka' => 'სხვა',
            ],
            'confirmed' => 200,
            'deaths' => 20,
            'recovered' => 180,
        ]);
    }

    public function test_worldwide_page_is_accessible()
    {

        $response = $this->get('worldwide-statistics');
        $response->assertSuccessful();
        $response->assertViewIs('dashboard.worldwide');
        $response->assertViewHasAll(['sumConfirmed', 'sumDeaths', 'sumRecovered']);
    }

    public function test_by_country_page_is_accessible()
    {

        $response = $this->get('by-country-statistics');
        $response->assertSuccessful();
        $response->assertViewIs('dashboard.byCountry');
        $response->assertViewHasAll(['sumConfirmed', 'sumDeaths', 'sumRecovered', 'countries']);
    }

    public function test_search_in_english()
    {

        $response = $this->withSession(['locale' => 'en'])
            ->get('/by-country-statistics?search=searchterm');

        $response->assertStatus(200);
        $response->assertViewHas('countries');
        $viewData = $response->viewData('countries');

        $this->assertCount(1, $viewData);
        $this->assertEquals($this->covidData1->id, $viewData->first()->id);
    }

    public function test_search_in_georgian()
    {

        $response = $this->withSession(['locale' => 'ka'])
            ->get('/by-country-statistics?search=საძიებო');

        $response->assertStatus(200);
        $response->assertViewHas('countries');
        $viewData = $response->viewData('countries');

        $this->assertCount(1, $viewData);
        $this->assertEquals($this->covidData1->id, $viewData->first()->id);
    }

    public function test_sort_confirmed_asc()
    {

        $response = $this->get('/by-country-statistics?sort_by=confirmed&sort_order=asc');

        $response->assertStatus(200);
        $viewData = $response->viewData('countries');

        $this->assertNotEmpty($viewData);
        $this->assertTrue($viewData->count() > 1);

        $prevConfirmed = null;
        foreach ($viewData as $item) {
            if (!is_null($prevConfirmed)) {
                $this->assertGreaterThanOrEqual($prevConfirmed, $item->confirmed);
            }
            $prevConfirmed = $item->confirmed;
        }
    }
    public function test_sort_deaths_asc()
    {

        $response = $this->get('/by-country-statistics?sort_by=deaths&sort_order=asc');

        $response->assertStatus(200);
        $viewData = $response->viewData('countries');

        $this->assertNotEmpty($viewData);
        $this->assertTrue($viewData->count() > 1);

        $prevDeaths = null;
        foreach ($viewData as $item) {
            if (!is_null($prevDeaths)) {
                $this->assertGreaterThanOrEqual($prevDeaths, $item->deaths);
            }
            $prevDeaths = $item->deaths;
        }
    }
    public function test_sort_recovered_asc()
    {

        $response = $this->get('/by-country-statistics?sort_by=recovered&sort_order=asc');

        $response->assertStatus(200);
        $viewData = $response->viewData('countries');

        $this->assertNotEmpty($viewData);
        $this->assertTrue($viewData->count() > 1);

        $prevRecovered = null;
        foreach ($viewData as $item) {
            if (!is_null($prevRecovered)) {
                $this->assertGreaterThanOrEqual($prevRecovered, $item->recovered);
            }
            $prevRecovered = $item->recovered;
        }
    }
}
