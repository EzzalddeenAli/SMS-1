<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login()
    {
        return view('auth.admin-login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()
            ->withErrors(['invalid' => 'Invalid username or password.'])
            ->withInput($request->except('password'));
    }
}
