<?php

namespace App\Http\Controllers;

class WebController extends Controller
{
    public function index()
    {            
        return view('home-page.index');
    }

    public function errorpage()
    {
        return view('error.404');
    }

    // public function login()
    // {
    //     return view('auth.login');
    // }
    

        public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function thankyou()
    {
        return view('thankyou');
    }

}
