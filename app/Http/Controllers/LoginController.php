<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //


    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // if ($user = Auth::user()) {
        //     if ($user->role == 'admin') {
        //         return redirect()->route('admin.dashboard.index');
        //     } elseif ($user->role == 'staff') {
        //         return redirect()->route('staff.dashboard.index');
        //     }
        // }

        // return redirect()->route('login.index');


        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard.index')->with('success', 'login berhasil !, Selamat datang ' . Auth::user()->name);
            } else if (Auth::user()->role == 'staff') {
                return redirect()->route('admin.dashboard.index')->with('success', 'login berhasil !, Selamat datang ' . Auth::user()->name);
            }
        } else {
            return redirect('login')->with('error', 'email atau password yang anda masukan salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
