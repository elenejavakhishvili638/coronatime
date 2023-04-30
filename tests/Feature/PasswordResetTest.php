<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ResetPasswordNotification;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        $token = Password::createToken($user);
    }

    public function test_password_reset_page_is_accessible(): void
    {

        $response = $this->get('/forgot-password');
        $response->assertViewIs('resetPassword.request');
        $response->assertSuccessful();
    }

    public function test_password_reset_email_storing()
    {

        Notification::fake();

        $user = User::factory()->create();

        $response = $this->post('/forgot-password', ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPasswordNotification::class, function ($notification, $channels) use ($user) {
            $expectedUrl = $notification->url;

            return Str::contains($expectedUrl, $user->email) && Str::startsWith($expectedUrl, url('/reset-password/'));
        });

        $response->assertRedirect(route('verifyEmail.confirmation'));
    }

    public function test_to_mail_notification()
    {

        $sampleUrl = 'https://example.com/reset-password/sample-token';
        $notification = new ResetPasswordNotification($sampleUrl);

        $notifiable = new AnonymousNotifiable;

        $mailMessage = $notification->toMail($notifiable);

        $this->assertEquals('Recover password', $mailMessage->subject);

        $renderedMailMessage = $mailMessage->render();
        $this->assertStringContainsString($sampleUrl, $renderedMailMessage);
    }


    public function test_password_reset_request_with_invalid_email()
    {
        $email = "elene@example.com";

        User::factory()->create([
            'email' => $email,
        ]);

        $response = $this->post('/forgot-password', [
            'email' => 'email@example.com',
        ]);


        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }


    public function test_show_password_reset_form_page_is_accessible()
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);

        $hashedToken = DB::table('password_reset_tokens')->where('email', $user->email)->value('token');

        $this->assertNotNull($hashedToken);
        $this->assertTrue(Hash::check($token, $hashedToken));
        $this->assertDatabaseHas('password_reset_tokens', ['token' => $hashedToken]);
        $this->assertDatabaseHas('password_reset_tokens', ['email' => $user->email]);

        $url = route('password.reset', ['token' => $token]) . '?email=' . $user->email;

        $response = $this->get($url);
        $response->assertStatus(200);

        $response->assertViewIs('resetPassword.reset');

        $response->assertViewHas('token', $token);
    }

    public function test_password_reset_submit_with_valid_token_and_new_password()
    {
        $user = User::factory()->create();
        $token = app('auth.password.broker')->createToken($user);

        $response = $this->post('/reset-password', [
            'email' => $user->email,
            'token' => $token,
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('resetPassword.update');

        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }

    public function test_password_reset_update_with_invalid_data()
    {
        $user = User::factory()->create();
        $token = app('auth.password.broker')->createToken($user);
        $newPassword = "newPassword";

        $response = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => $newPassword,
            'password_confirmation' => "wrongPassword"
        ]);

        $response->assertSessionHasErrors('password');
    }
}
