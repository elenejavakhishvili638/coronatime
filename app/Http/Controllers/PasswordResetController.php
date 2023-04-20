<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PasswordResetController extends Controller
{
    public function showRequest(): View
    {
        return view('resetPassword.request');
    }
    public function storeEmail()
    {
    }
    public function showReset()
    {
    }
    public function update()
    {
    }
}
