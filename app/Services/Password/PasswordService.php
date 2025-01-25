<?php

namespace App\Services\Password;

use App\Repositories\Password\PasswordRepository;

class PasswordService
{
    /**
     * Create a new class instance.
     */
    protected $passRepo;
    public function __construct(public PasswordRepository $passwordRepository)
    {
        $this->passRepo = $passwordRepository;
    }
    public function verifyEmail($email)
    {
        $admin = $this->passRepo->getAdminByEmail($email);
        if (!$admin) {
            return false;
        }
        return $admin;
    }
    public function verifyOtp($data)
    {
        $OTP = $this->passRepo->verifyOtp($data);
        return $OTP->status;
    }
    public function resetPassword($email, $password)
    {
        return $this->passRepo->resetPassword($email, $password);
    }
}
