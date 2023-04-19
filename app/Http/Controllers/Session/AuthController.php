<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
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

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages(['email' => 'Your provided credential could not be verified']);
        }

        session()->regenerate();

        return redirect('worldwide-statistics');
    }

    public function logout()
    {
        auth()->logout();

        return redirect("/");
    }
}
