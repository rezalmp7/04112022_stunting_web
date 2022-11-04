<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin/login');
    }
    public function loginAction(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $kredensil = $request->only('username','password');


        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            
            $request->session()->regenerate();
 
            return redirect()->intended('admin/dashboard');
        }
        dd('ora masuk');

    }
    public function logout() {
        Auth::logout();

        return redirect()->intended('login');
    }
}
