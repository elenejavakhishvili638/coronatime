<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    protected $redirectTo = '/';
    public function show(Request $request): View
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('verifyEmail.confirmEmail');
        // return view('verifyEmail.confirmEmail');
    }

    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        auth()->logout();
        return redirect($this->redirectPath());
    }

    protected function redirectPath()
    {
        return '/';
    }
}
