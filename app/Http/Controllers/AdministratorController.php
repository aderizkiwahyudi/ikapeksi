<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            return redirect(route('adminDashboard'));
        }

        return view('administrator.login');
    }

    public function loginProses(Request $request)
    {
        $users = User::where('email', $request->email)->orWhere('username', $request->email)->first();
        if(!$users){
            return redirect()->back()->withErrors('Email atau username tidak ditemukan');
        }

        if(password_verify($request->password, $users->password)){
            Auth::login($users);
            return redirect(route('adminDashboard'));
        }

        return redirect()->back()->withErrors('Password yang anda masukan salah');
    }
}
