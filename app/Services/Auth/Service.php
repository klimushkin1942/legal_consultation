<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Service
{
    public function register($credentials)
    {
        return User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'role_id' => User::CLIENT
        ]);
    }

    public function login(User $user, $credentials)
    {
        if(Hash::check($credentials['password'], $user->password)) {
            return [
                'token' => $user->createToken('token')->plainTextToken
            ];
        }

        return __('auth.login.failed');
    }
}
