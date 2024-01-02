<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->route('home');

    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.view');
    }
}