<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_register_page_is_accessible()
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertSee('Already have an account?');
        $response->assertViewIs('register.create');
    }

    public function test_user_can_register()
    {
        $userData = [
            'email' => 'elene@example.com',
            'username' => 'elene',
            'password' => 'password',
            'checkPassword' => 'password',
        ];

        $response = $this->post('/register', $userData);

        $response->assertRedirect(route('verification.notice'));

        $this->assertDatabaseHas('users', [
            'email' => $userData['email'],
            'username' => $userData['username'],
        ]);


        $this->assertAuthenticated();
    }
}
