<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('auth.login');
    }

    public  function  login(Request $request)
    {

        $this->validate($request,[
            'username'=>'required|max:255',
            'password'=>'required'
        ]);

        if (!auth()->attempt($request->only('username','password'))){
            return back()->with('status','Invalid credentials');
        }
        return redirect()->route('register');

    }
}
