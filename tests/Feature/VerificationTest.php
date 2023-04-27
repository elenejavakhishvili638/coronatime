<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class VerificationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase, WithFaker;
    public function test_show_email_verification_notice()
    {

        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $this->actingAs($user);

        $response = $this->get(route('verification.notice'));

        $response->assertViewIs('verifyEmail.confirmEmail');
    }

    public function test_show_email_verification_notice_for_verified_user()
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $this->actingAs($user);

        $response = $this->get(route('verification.notice'));

        $response->assertRedirect('/');
    }

    public function test_show_email_verification_notice_for_unverified_user()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $this->actingAs($user);

        $response = $this->get(route('verification.notice'));

        $response->assertViewIs('verifyEmail.confirmEmail');
    }

    public function test_email_verification()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $signedUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $this->actingAs($user);

        $response = $this->get($signedUrl);

        $user->refresh();
        $this->assertNotNull($user->email_verified_at);

        $this->assertGuest();

        $response->assertRedirect(route('verifyEmail.successful'));
    }
}
