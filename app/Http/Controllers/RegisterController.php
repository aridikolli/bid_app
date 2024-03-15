<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //


    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request,
        [
           'first_name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'username'=>'required|max:255',
            'password'=>'required|confirmed'
        ]);
        $user= new User();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->username=$request->username;
        $user->password=Hash::make($request->password);
        $user->save();
        auth()->attempt($request->only('username','password'));
        return redirect()->route('login');
        }
}
