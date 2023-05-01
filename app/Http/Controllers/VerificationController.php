<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function show(Request $request): mixed
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect(route('login'))
            : view('verifyEmail.confirmEmail');
    }

    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        auth()->logout();
        return redirect()->route('verifyEmail.successful');
    }
}
