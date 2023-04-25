<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_login_page_is_accessible()
    {
        $response = $this->get('/');
        $response->assertSuccessful();
        $response->assertSee('Sign up for free');
        $response->assertViewIs('sessions.create');
    }
}
