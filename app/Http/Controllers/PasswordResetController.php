<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function showRequest(): View
    {
        return view('resetPassword.request');
    }

    public function storeEmail(EmailRequest $request): mixed
    {
        $attributes = $request->validated();

        $user = User::where('email', $attributes['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => trans('error')]);
        }

        $token = app('auth.password.broker')->createToken($user);
        $url = url('/reset-password/' . $token . '?email=' . $attributes['email']);
        $user->notify(new ResetPasswordNotification($url));

        return redirect()->route('verification.notice');
    }

    public function showReset(string $token): View
    {
        return view('resetPassword.reset', ['token' => $token]);
    }

    public function update(PasswordRequest $request): mixed
    {
        $attributes = $request->validated();
        $status = Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );


        if ($status === Password::PASSWORD_RESET) {
            return view('resetPassword.update');
        } else {
            return back()->withErrors(['password' => trans($status)]);
        }
    }
}
