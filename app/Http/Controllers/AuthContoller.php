<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $pageName = "FISKOM Library System - Login";
        $navbarType = "navbar_empty";
        return view('auth.login', ['pageName' => $pageName, 'navbarType' => $navbarType]);
    }

    public function login(Request $request){

        $loginData = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($loginData)){
            $user = Auth::user();
            $request->session()->regenerate();
            $token = $request->session()->token();
            return redirect()->intended('/dashboard');

        }else{
            return back()->with('loginFailed', 'Username atau password anda tidak valid');
        }
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
