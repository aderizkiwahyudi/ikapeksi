<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Photo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class GalleryController extends Controller
{
    public function view_index()
    {
        return view('administrator.galeri.index');
    }

    public function view_add()
    {
        return view('administrator.galeri.add');
    }
    
    public function view_edit(Request $request)
    {
        $galeri = Gallery::where('id', $request->id)->firstOrFail();
        return view('administrator.galeri.edit', compact('galeri'));
    }

    public function index()
    {
        return Datatables::of(Gallery::query())
        ->addColumn('action', function($item){
            return '
            <a href="' . route('galeri.view.edit', $item->id) . '" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a> 
            <a href="' . route('galeri.view.delete', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>';
        })
        ->addIndexColumn()
        ->make(true);
    }

    public function create(Request $request)
    {
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

        // $photo = $request->file('thumbnail');
        // if($photo){
        //     $photo_name = $photo->getClientOriginalName();
        //     $photo_rename = time() . '-' . $photo_name;
        //     $photo->move('img', $photo_rename);
        //     $photo = asset('img/' . $photo_rename);
        // }

        $galeri = new Gallery();
        $galeri->title = $request->title;
        $galeri->text = $request->text;
        $galeri->slug = Str::slug($request->title);
        $galeri->save();

        return redirect(route('galeri.view.index'));
    }

    public function edit(Request $request)
    {
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
        
        $data = [
            'title' => $request->title,
            'text' => $request->text,
            'slug' => Str::slug($request->title),
        ];

        // $photo = $request->file('thumbnail');
        // if($photo){
        //     $photo_name = $photo->getClientOriginalName();
        //     $photo_rename = time() . '-' . $photo_name;
        //     $photo->move('img', $photo_rename);
        //     $data['thumbnail'] = asset('img/' . $photo_rename);
        // }

        Gallery::where('id', $request->id)->update($data);

        return redirect(route('galeri.view.index'));
    }

    public function delete(Request $request)
    {
        Gallery::where('id', $request->id)->delete();
        return back();
    }

    ##ADD IMAGE
    public function getPhotos(Request $request)
    {
        return Datatables::of(Photo::query())
        ->addColumn('photo', function($item){
            return '<img src="' . $item->photo . '" width="40%"" alt="photo"/>';
        })
        ->addColumn('action', function($item){
            return '<a href="' . route('photo.delete', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>';
        })
        ->addIndexColumn()
        ->rawColumns(['photo', 'action'])
        ->make(true);
    }

    public function photo_delete(Request $request)
    {
        Photo::where('id', $request->id)->delete();
        return back();
    }

    public function photo_add(Request $request)
    {
        $rules = [
            'photo' => 'required',
            'photo.*' => 'image',
        ];

        $message = [
            'photo.required' => 'Gambar tidak boleh kosong',
            'photo.image' => 'Format File harus berupa gambar',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }
        
        $photos = $request->file('photo');
        foreach($photos as $photo){
            $photo_name = $photo->getClientOriginalName();
            $photo_rename = time() . '-' . $photo_name;
            $photo->move('img', $photo_rename);
            $photo = asset('img/' . $photo_rename);
    
            $p = new Photo();
            $p->id_gallery = $request->id;
            $p->photo = $photo;
            $p->file_name = $photo_rename;
            $p->save();
        }

        return back();
    }
}
