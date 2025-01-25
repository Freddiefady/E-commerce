<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\SendOtpNotify;
use App\Services\Password\PasswordService;
use App\Http\Requests\Auth\ForgetPasswordRequest;

class ForgetPasswordController extends Controller
{
    public function __construct(public Otp $otp,public PasswordService $passwordService)
    {
        // No need to create a new instance of Otp here Constructor property promotion
    }
    public function index()
    {
        return view('dashboard.auth.password.email');
    }
    public function verifyEmail(ForgetPasswordRequest $request)
    {
        $request->validated();
        $admin = $this->passwordService->verifyEmail($request->email);
        if (!$admin){
            return redirect()->back()->withErrors(['email' => __('passwords.email_is_register')]);
        }
        return redirect()->route('dashboard.password.send.otp', ['email' => $admin->email]);
    }
    public function sendOtp($email)
    {
        return view('dashboard.auth.password.confirm',['email'=>$email]);
    }
    public function verifyOtp(ForgetPasswordRequest $request)
    {
        $request->validated();
        $data = $request->only('email','token');
        if(!$this->passwordService->verifyOtp($data))
        {
            return redirect()->back()->withErrors(['otp' => 'OTP is not valid']);
        }
        return redirect()->route('dashboard.reset.password',['email' => $request->email]);
    }
}
