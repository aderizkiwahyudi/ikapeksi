<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Program;
use App\Models\Report;
use App\Models\User;
use App\Models\Web;
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
    public function view_pengaturan_web(Request $request)
    {
        $web = Web::latest()->first();
        return view('administrator.pengaturan.web.index', compact('web'));
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

    public function pengaturan_web(Request $request)
    {
        $rules = [
            'name' => 'required',
            'logo' => 'image',
            'about' => 'required',
            'email' => 'required|email',
            'instagram' => 'required|url',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'phone' => 'required',
            'photo' => 'image',
            'sambutan' => 'required',
        ];

        $message = [
            'name.required' => 'Username tidak boleh kosong',
            'logo.image' => 'Logo harus berupa gambar',
            'about.required' => 'Tentang Kami tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'instagram.required' => 'Username tidak boleh kosong',
            'instagram.url' => 'URL Instagram tidak valid',
            'facebook.required' => 'Username tidak boleh kosong',
            'facebook.url' => 'URL Facebook tidak valid',
            'twitter.required' => 'Username tidak boleh kosong',
            'twitter.url' => 'URL Twitter tidak valid',
            'phone.required' => 'No Telp tidak boleh kosong',
            'photo.image' => 'Foto Ketua Umum harus berupa Gambar',
            'sambutan.required' => 'Sambutan Ketua Umum tidak boleh kosong',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $data = [
            'name' => $request->name,
            'about' => $request->about,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'phone' => $request->phone,
            'sambutan' => $request->sambutan,
        ];

        $photo = $request->file('photo');
        if($photo){
            $photo_name = $photo->getClientOriginalName();
            $photo_rename = time() . '-' . $photo_name;
            $photo->move('img', $photo_rename);
            $data['photo'] = asset('img/' . $photo_rename);
        }

        $logo = $request->file('logo');
        if($logo){
            $logo_name = $logo->getClientOriginalName();
            $logo_rename = time() . '-' . $logo_name;
            $logo->move('img', $logo_rename);
            $data['logo'] = asset('img/' . $logo_rename);
        }

        Web::latest()->update($data);
        
        Session::flash('success', 'Berhasil memperbarui data');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
