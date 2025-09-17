<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {

        return view('auth.login');
    }

    public function loginStore(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }


        return back()->withErrors(['Credentials are not correct']);
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function registerStore(Request $request) {

        $request->validate([
            'fullName' => ['required', 'min:4'], 
            'username' => ['required','unique:users','min:3'],
            'password' => ['required', 'min:6']
        ]);

        $user = new User();

        $user->fullName = $request->input('fullName');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->save();


        return redirect('register')->with('success', 'Account created successfully!');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
