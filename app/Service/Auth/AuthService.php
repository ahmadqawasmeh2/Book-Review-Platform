<?php

namespace App\Service\Auth;

use App\Models\User;
use App\Repository\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct(private UserRepository $userRepository) {}
    public function login(array $data): bool
    {
        $credential = [
            "email" => $data['email'],
            "password" => $data['password'],
        ];
        $user = User::where([['email', $data['email']], ['role', 'user']])->exists();
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


    public function register(array $data)
    {
        $this->userRepository->create($data);
        $this->login($data);
        return redirect()->route('home.index');
    }
}
