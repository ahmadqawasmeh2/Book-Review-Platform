<?php

namespace App\Http\Controllers\Portal\Auth;

use App\Http\Controllers\Controller;
use App\Service\Auth\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    static string $viewPath = 'portal.auth.';

    public function __construct(private AuthService $loginService) {}

    public function getPageLogin()
    {
        return view(self::$viewPath . 'login');
    }
    public function getPageRegister()
    {
        return view(self::$viewPath . 'register');
    }

    public function login(Request $request): RedirectResponse
    {
        if ($this->loginService->login($request->all())) {
            return redirect()->route("home.index");
        }
        return  back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(): RedirectResponse
    {
        if ($this->loginService->logout()) {
            return redirect()->route("home.index");
        }
        return  back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request): RedirectResponse
    {
        if ($this->loginService->register($request->all())) {
            return redirect()->route("home.index");
        }
        return redirect()->route("home.index");
    }
}
