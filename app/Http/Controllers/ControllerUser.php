<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ControllerUser extends Controller
{
    public function index() {
        return view('home', [
            'titlePage' => 'Home',
            'products' => Product::take(5)->get()
        ]);
    }

    public function viewLogin(){
        return view('login', [
            'titlePage' => 'Login'
        ]);
    }

    public function viewRegister(){
        return view('register', [
            'titlePage' => 'Register'
        ]);
    }

    public function login(Request $request) : RedirectResponse {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->with('loginError', 'Username or Password is Incorrect!');
    }

    public function logout(Request $request) : RedirectResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register(Request $request) {
        $registerData = $request->validate([
            'name' => ['required'],
            'username' => ['required','unique:users'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //$registerData['password'] = Hash::make($registerData['password']);

        User::create($registerData);

        return redirect('/')->with('success', 'Registrasion Was Successfull! Please Login');
    }
}
