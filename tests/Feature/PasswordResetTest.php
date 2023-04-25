<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Notifications\AnonymousNotifiable;
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

            $token = app('auth.password.broker')->createToken($user);
            $expectedUrl = url('/reset-password/' . $token . '?email=' . $user->email);

            return $expectedUrl;
        });

        $response->assertRedirect(route('verifyEmail.confirmation'));
    }

    public function test_to_mail_notification()
    {

        $sampleUrl = 'https://example.com/reset-password/sample-token';
        $notification = new ResetPasswordNotification($sampleUrl);

        $notifiable = new AnonymousNotifiable;

        $mailMessage = $notification->toMail($notifiable);

        $this->assertEquals('Verify your email address', $mailMessage->subject);

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

    // public function test_show_reset_form()
    // {

    //     $user = User::factory()->create();
    //     $token = app('auth.password.broker')->createToken($user);


    //     $response = $this->get(route('password.reset', ['token' => $token]));

    //     // dd($token);
    //     $response->assertStatus(200);
    //     $response->assertViewIs('resetPassword.reset');
    //     $response->assertViewHas('token', $token);
    // }

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
