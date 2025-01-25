<?php

namespace App\Repositories\Password;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;

class PasswordRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct(public Otp $otp)
    {
    }
    public function getAdminByEmail($email)
    {
        $admin = Admin::whereEmail($email)->first();
        return $admin;
    }
    public function verifyOtp($data)
    {
        $OTP = $this->otp->validate($data['email'], $data['token']);
        return $OTP;
    }
    public function resetPassword($email, $password)
    {
        $admin = self::getAdminByEmail($email);
        $admin->update([
            'password'=>bcrypt($password)
        ]);
        return $admin;
    }

}
