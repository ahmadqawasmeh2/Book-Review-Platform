<?php

namespace App\Service\Admin\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(array $data): bool
    {
        $credential = [
            "email" => $data['email'],
            "password" => $data['password'],
        ];
        $user = User::where([['email', $data['email']], ['role', 'admin']])->exists();
        if ($user) {
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return true;
            }
        }
        return false;
    }

    public function logout(): bool
    {
        if (Auth::check()) {
            Auth::logout();
            return true;
        }
        return false;
    }
}
