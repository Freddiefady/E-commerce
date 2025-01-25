<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Services\Password\PasswordService;

class ResetPasswordController extends Controller
{
    public function __construct(public PasswordService $passwordService){}
    public function resetPasswordShow($email)
    {
        return view('dashboard.auth.password.reset', ['email'=> $email]);
    }
    public function resetPasswordUpdate(ResetPasswordRequest $request)
    {
        $request->validated();
        $admin = $this->passwordService->resetPassword($request->email, $request->password);
        if(!$admin)
        {
            Session::flash('error','Password does not match');
            return redirect()->back()->with(['error'=>'Password does not match']);
        }
        return redirect()->route('dashboard.Welcome')->with(['success'=>'Successfully updated']);
    }
}
