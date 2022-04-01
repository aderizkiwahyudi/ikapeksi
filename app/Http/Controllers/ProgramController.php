<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    public function view_index()
    {
        return view('administrator.program.index');
    }
    public function index()
    {
        return DataTables::of(Program::query())
        ->addColumn('action', function($item){
            return '
            <a href="javascript:void(0)" data-id="' . $item->id . '" data-name="' . $item->name . '" data-url="' . $item->url . '" class="btn btn-warning text-white edit"><i class="fas fa-pencil-alt"></i></a> 
            <a href="' . route('program.delete', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>';
        })
        ->addIndexColumn()
        ->make(true);
    }
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'url' => 'required|url',
        ];

        $message = [
            'name.required' => 'Judul tidak boleh kosong',
            'name.max' => 'Judul terlalu panjang, maksimal 100 karakter',
            'url.required' => 'URL tidak boleh kosong',
            'url.url' => 'URL tidak valid', 
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $program = new Program();
        $program->name = $request->name;
        $program->url = $request->url;
        $program->save();

        return redirect()->back();
    }
    public function edit(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'url' => 'required|url',
        ];

        $message = [
            'name.required' => 'Judul tidak boleh kosong',
            'name.max' => 'Judul terlalu panjang, maksimal 100 karakter',
            'url.required' => 'URL tidak boleh kosong',
            'url.url' => 'URL tidak valid', 
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        Program::where('id', $request->id)->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return redirect()->back();
    }
    public function delete(Request $request)
    {
        Program::where('id', $request->id)->delete();
        return redirect()->back();
    }
}
