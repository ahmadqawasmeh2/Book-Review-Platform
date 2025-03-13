<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Service\Admin\Auth\LoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    static string $viewPath = 'admin.auth.';
    static string $routePath = 'admin.auth.';

    public function __construct(private LoginService $login_service) {}

    public function getPage(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view(self::$viewPath . 'login');
    }

    public function login(Request $request): RedirectResponse
    {
        if ($this->login_service->login($request->all())) {
            return redirect()->route("admin.home.index");
        }
        return  back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(): RedirectResponse
    {
        if ($this->login_service->logout()) {
            return redirect()->route("admin.auth.login");
        }
        return  back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
