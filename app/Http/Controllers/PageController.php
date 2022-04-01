<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Web;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function view_register(Request $request)
    {
        $web = Web::first();
        return view('administrator.page.register', compact('web'));
    }
    public function view_edit(Request $request)
    {
        $page = Page::where('slug', $request->slug)->firstOrFail();
        return view('administrator.page.edit', compact('page'));
    }
    public function register(Request $request)
    {
        $rules = [
            'url' => 'required|url',
        ];

        $message = [
            'url.required' => 'URL tidak boleh kosong',
            'url.url' => 'Masukan URL dengan benar',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        Web::latest()->update(['pendaftaran' => $request->url]);

        Session::flash('success', 'Berhasil memperbarui data');
        return redirect()->back();
    }
    public function edit(Request $request)
    {
        $page = Page::where('slug', $request->slug)->firstOrFail();

        $rules = [
            'title' => 'required|max:100',
            'text' => 'required',
        ];

        $message = [
            'title.required' => 'Judul tidak boleh kosong',
            'title.max' => 'Judul terlalu panjang, maksimal 100 karakter',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $photo = $request->file('thumbnail');
        
        $data = [
            'title' => $request->title,
            'text' => $request->text,
        ];

        if(!$page->permanent){
            $data['slug'] = Str::slug($request->title);
        }

        Page::where('id', $page->id)->update($data);

        Session::flash('success', 'Berhasil memperbarui data');
        return redirect()->back();
    }
}
