<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Разлогиниваем всех кто не админ
     * @param Request $request
     * @param $user
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->id !== 1)
            $this->guard()->logout();
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
}
