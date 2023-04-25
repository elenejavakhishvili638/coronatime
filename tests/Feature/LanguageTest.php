<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LanguageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_switch_language()
    {
        $initialLocale = 'en';
        $newLocale = 'ka';

        $this->withSession(['locale' => $initialLocale]);

        $response = $this->post(route('setLanguage'), ['locale' => $newLocale]);

        $response->assertSessionHas('locale', $newLocale);

        $response->assertRedirect();
    }
}
