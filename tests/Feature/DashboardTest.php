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

    public function test_worldwide_page_is_accessible()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('worldwide-statistics');
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.worldwide');
        $response->assertViewHasAll(['sumConfirmed', 'sumDeaths', 'sumRecovered']);
    }

    public function test_by_country_page_is_accessible()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('by-country-statistics');
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.byCountry');
        $response->assertViewHasAll(['sumConfirmed', 'sumDeaths', 'sumRecovered', 'countries']);
    }
}
