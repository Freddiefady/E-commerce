<?php

namespace App\Http\Controllers\Dashboard\Auth;

use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginAdminRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AuthController extends Controller implements HasMiddleware
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public static function middleware()
    {
        return [
            new Middleware(middleware: 'guest:admin', except: ['logout']),
        ];
    }
    public function showFormLogin()
    {
        return view('dashboard.auth.login');
    }
    public function login(LoginAdminRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if($this->authService->login($credentials, 'admin', $request->remember)) {
            return redirect()->intended(route('dashboard.Welcome'))->with('success', __('auth.login_message'));
        } else {
            return redirect()->back()->with('error', __('auth.not_match'));
        }
    }
    public function logout()
    {
        $this->authService->logout('admin');
        return redirect()->route('dashboard.login')->with('success', __('auth.logout_message'));
    }
}
