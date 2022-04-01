<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Program;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $news = News::get();
        $event = Event::get();
        $galeri = Gallery::get();
        $program = Program::get();

        return view('administrator.dashboard.index', compact('news', 'event', 'galeri', 'program'));
    }
    public function view_pengaturan()
    {
        return view('administrator.pengaturan.index');
    }
    public function pengaturan(Request $request)
    {
        $rules = [
            'username' => 'required|alpha_dash|unique:users,id,' . Auth::user()->id,
            'email' => 'required|email|unique:users,id,' . Auth::user()->id,
        ];

        $message = [
            'username.required' => 'Username tidak boleh kosong',
            'username.alpha_dash' => 'Username hanya boleh dengan huruf dan angka',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Username sudah terdaftar',
            'email.email' => 'Masukan email dengan benar',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $data = [
            'username' => $request->username,
            'email' => $request->email,
        ];

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

        User::where('id', Auth::user()->id)->update($data);
        
        Session::flash('success', 'Berhasil memperbarui data');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
