<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $password = $attributes['password'];

        $attributes['password'] = Hash::make($password);

        $user = User::create($attributes);

        auth()->login($user);

        $user->notify(new VerifyEmailNotification());

        return redirect(route('verification.notice'));
    }
}
