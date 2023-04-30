<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create(): View
    {
        return view('sessions.create');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $remember = request()->has('remember');

        $user = User::where('email', $attributes['username'])->orWhere('username', $attributes['username'])->first();

        if ($user && auth()->attempt(['email' => $user->email, 'password' => $attributes['password']], $remember)) {
            session()->regenerate();
            return redirect('worldwide-statistics');
        }

        throw ValidationException::withMessages(['password' => __('validation.custom.invalid_password', ['attribute' => __('validation.attributes.password')])]);
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect("/");
    }
}
