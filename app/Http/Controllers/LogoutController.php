<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class LogoutController extends Controller
{


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
