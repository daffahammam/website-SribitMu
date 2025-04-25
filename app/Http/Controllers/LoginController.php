<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Committee;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        if(Auth::attempt($credentials)){
            $request->session()->regenerate(); 
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Gagal');
    }

    public function dashboard()
    {
        $committees = Committee::all();
        
        
        return view('dashboard', compact('committees'));
        
    }

    // public function registerproses(Request $request){
    //     User::create([
    //         'username' => $request->username,
    //         'password' => $request->password,
    //     ]);
        
    //     return redirect('/login');
    // }


    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/welcome'); // Arahkan ke halaman yang diinginkan setelah logout
    }

}