<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginActivity;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function adminLogin(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password,
            'status'=> 1
        ])) {
            $request->session()->regenerate();
            LoginActivity::create([
                'user_id'   => Auth::guard('admin')->id(),
                'guard'     => 'admin',
                'login_ip'  => $request->ip(),
                'date_time' => now(),
            ]);
            return redirect()->route('dashboard');
        }elseif(Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password,
            'status'=> 0
        ])){
            return back()->withErrors([
                'login' => 'User is not Active, Please Contact with Administrator.',
            ])->withInput();
        }

        return back()->withErrors([
            'login' => 'Invalid credentials for the selected user.',
        ])->withInput();
    }

    public function employeeLogin(Request $request)
    {
        $request->validate([
            'user_email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('employee')->attempt([
            'user_email' => $request->user_email,
            'password' => $request->password,
            'login_allowed' => 1
        ])) {
            $request->session()->regenerate();
            LoginActivity::create([
                'user_id'   => Auth::guard('employee')->user()->emp_personal_id,
                'guard'     => 'employee',
                'login_ip'  => $request->ip(),
                'date_time' => now(),
            ]);
            return redirect()->route('employee-dashboard');
        }elseif(Auth::guard('employee')->attempt([
            'user_email' => $request->user_email,
            'password' => $request->password,
            'login_allowed' => 0
        ])){
            return back()->withErrors([
                'login' => 'Your employee account disabled. Contact with admin.',
            ])->withInput();
        }

        return back()->withErrors([
            'login' => 'Invalid credentials for the selected user.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        $guard = Auth::guard('admin')->check() ? 'admin' : 'employee';
        Auth::guard($guard)->logout();
        return redirect()->route('login');
    }

}
