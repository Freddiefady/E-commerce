<?php
namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Auth;

class AuthRepository {

    public function login($credentials, $guards, $remember)
    {
        return Auth::guard($guards)->attempt($credentials, $remember);
    }
    public function logout($guards)
    {
        return Auth::guard($guards)->logout();
    }
}
