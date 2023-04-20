<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PasswordResetController extends Controller
{
    public function showRequest(): View
    {
        return view('resetPassword.request');
    }
    public function storeEmail(EmailRequest $request)
    {
        $attributes = $request->validated();

        $user = User::where('email', $attributes['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => trans('error')]);
        }

        $token = app('auth.password.broker')->createToken($user);
        $url = url('/reset-password/' . $token . '?email=' . $attributes['email']);
        $user->notify(new ResetPasswordNotification($url));

        return  view('verifyEmail.confirmEmail');
    }
    public function showReset()
    {
    }
    public function update()
    {
    }
}
