<?php

namespace Tests\Feature;

use App\Models\User;
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

    public function test_auth_should_redirect_to_dashboard_after_successful_email_login()
    {
        $email = "ako@example.com";
        $password = "password";
        $username = "ako";

        User::factory()->create([
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $response = $this->post('/', [
            'username' => $email,
            'password' => $password
        ]);

        $response->assertRedirect(route('worldwide.show'));
        $this->assertAuthenticated();
    }

    public function test_auth_should_redirect_to_dashboard_after_successful_username_login()
    {
        $email = "ako@example.com";
        $username = "ako";
        $password = "password";

        User::factory()->create([
            'email' => $email,
            'username' => $username,
            'password' => bcrypt($password),
        ]);

        $response = $this->post('/', [
            'username' => $username,
            'password' => $password
        ]);

        $response->assertRedirect(route('worldwide.show'));
        $this->assertAuthenticated();
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('login.destroy'));

        $this->assertGuest();

        $response->assertRedirect('/');
    }

    public function test_auth_should_fail_with_incorrect_email()
    {
        $email = "elene@example.com";
        $username = "elene";
        $password = "password";

        User::factory()->create([
            'email' => $email,
            'username' => $username,
            'password' => bcrypt($password),
        ]);

        $response = $this->post('/', [
            'username' => 'email@example.com',
            'password' => $password
        ]);


        $response->assertSessionHasErrors(['username']);

        $response->assertSessionDoesntHaveErrors(['password']);
    }

    public function test_auth_should_fail_with_incorrect_username()
    {
        $email = "elene@example.com";
        $username = "elene";
        $password = "password";

        User::factory()->create([
            'email' => $email,
            'username' => $username,
            'password' => bcrypt($password),
        ]);

        $response = $this->post('/', [
            'username' => 'elene123',
            'password' => $password
        ]);

        $response->assertSessionHasErrors(['username']);

        $response->assertSessionDoesntHaveErrors(['password']);
    }

    public function test_auth_should_fail_with_incorrect_password()
    {
        $email = "elene@example.com";
        $password = "password";

        User::factory()->create([
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $response = $this->post('/', [
            'username' => $email,
            'password' => 'wrong-password'
        ]);


        $response->assertSessionHasErrors('email', 'Your provided credential could not be verified');

        $response->assertSessionDoesntHaveErrors(['username']);
    }
}
