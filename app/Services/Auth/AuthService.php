<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepository;

class AuthService {

    protected $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login($credentials, $guards, $remember)
    {
        return $this->authRepository->login($credentials, $guards, $remember);
    }
    public function logout($guards)
    {
        return $this->authRepository->logout($guards);
    }
}
