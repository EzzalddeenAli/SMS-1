<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        $roles = ['admin', 'teacher', 'student', 'registrar'];
        $intended = Session::get('url.intended', url('/'));
        $previous = $this->endUrl(url()->previous());
        foreach ($roles as $role) {
            //if user intended url and role does not match, show login form
//            dd(end($intended_arr));
//            dd(url()->previous());
            try {
                if ( Auth::guard($role)->check()
                    && ($role !== $this->endUrl($intended))
                    && ($this->endUrl($intended) !== 'login')
                    && ($this->endUrl($intended) !== '127.0.0.1:8000')
                    && ( !Auth::guard($previous)->check())
                ) {
                    return $this->loginForm();
                } else if (Auth::guard($role)->check()) {
                    return redirect()->route("$role.dashboard");
                }
            } catch (Exception $e) {
                return $this->loginForm();
            }

        }

        return $this->loginForm();
    }

    public function endUrl($url)
    {
        $endUrl = explode('/', $url);
        return end($endUrl);
    }

    public function loginForm()
    {
        return view('auth.login', [
            'route'  => 'user.authenticate',
            'header' => ''
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        // check if username and password match any roles
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.dashboard'));
        } else if (Auth::guard('registrar')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('registrar.dashboard'));
        } else if (Auth::guard('student')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('student.dashboard'));
        } else if (Auth::guard('teacher')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('teacher.dashboard'));
        }

        // if failed return with error
        return redirect()->back()
            ->withErrors(['invalid' => 'Invalid username or password.'])
            ->withInput($request->except('password'));
        }

}
