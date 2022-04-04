<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function view_index()
    {
        return view('administrator.review.index');
    }
    public function index()
    {
        return DataTables::of(Review::query())
        ->addColumn('photo', function($item){
            return "<div clas='photo profile'><img src='" . $item->photo . "' width='100px'/></div>";
        })
        ->addColumn('action', function($item){
            return '
            <a href="javascript:void(0)" data-id="' . $item->id . '" data-photo="' . $item->photo . '" data-name="' . $item->name . '" data-ulasan="' . $item->text . '" class="btn btn-warning text-white edit"><i class="fas fa-pencil-alt"></i></a> 
            <a href="' . route('review.delete', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>';
        })
        ->addIndexColumn()
        ->rawColumns(['photo', 'action'])
        ->make(true);
    }
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'text' => 'required|max:200',
            'photo' => 'required|image',
        ];

        $message = [
            'name.required' => 'Judul tidak boleh kosong',
            'name.max' => 'Judul terlalu panjang, maksimal 100 karakter',
            'text.required' => 'Ulasan tidak boleh kosong',
            'text.max' => 'Ulasan terlalu panjang', 
            'photo.required' => 'Foto tidak boleh kosong',
            'photo.image' => 'Foto harus berupa gambar',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $photo = $request->file('photo');
        $photo_name = $photo->getClientOriginalName();
        $photo_rename = rand() . '-' . $photo_name;
        $photo->move('img', $photo_rename);
        $photo = asset('img/' . $photo_rename);

        $program = new Review();
        $program->name = $request->name;
        $program->text = $request->text;
        $program->photo = $photo;
        $program->save();

        return redirect()->back();
    }
    public function edit(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'text' => 'required|max:200',
            'photo' => 'image',
        ];

        $message = [
            'name.required' => 'Judul tidak boleh kosong',
            'name.max' => 'Judul terlalu panjang, maksimal 100 karakter',
            'text.required' => 'Ulasan tidak boleh kosong',
            'text.max' => 'Ulasan terlalu panjang', 
            'photo.image' => 'Foto harus berupa gambar',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $data = [
            'name' => $request->name,
            'text' => $request->text,
        ];

        $photo = $request->file('photo');
        if($photo){
            $photo_name = $photo->getClientOriginalName();
            $photo_rename = rand() . '-' . $photo_name;
            $photo->move('img', $photo_rename);
            $data['photo'] = asset('img/' . $photo_rename);
        }

        Review::where('id', $request->id)->update($data);

        return redirect()->back();
    }
    public function delete(Request $request)
    {
        Review::where('id', $request->id)->delete();
        return redirect()->back();
    }
}
