<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('register.create');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $user = User::create($attributes);


        auth()->login($user);

        return back();
    }
}
