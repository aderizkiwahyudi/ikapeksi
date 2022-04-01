<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Report_file;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function view_index()
    {
        return view('administrator.report.index');
    }
    public function view_check(Request $request)
    {
        return view('administrator.report.files.index');
    }
    public function view_add(Request $request)
    {
        return view('administrator.report.files.add');
    }
    public function view_edit(Request $request)
    {
        $file = Report_file::where('id', $request->id)->firstOrFail();
        return view('administrator.report.files.edit', compact('file'));
    }
    public function index()
    {
        return DataTables::of(Report::query())
        ->addColumn('action', function($item){
            return '
            <a href="' . route('laporan.view.check', $item->id) . '" class="btn btn-primary text-white"><i class="fas fa-eye"></i></a> 
            <a href="javascript:void(0)" data-id="' . $item->id . '" data-name="' . $item->name . '" data-url="' . $item->url . '" class="btn btn-warning text-white edit"><i class="fas fa-pencil-alt"></i></a> 
            <a href="' . route('laporan.delete', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>';
        })
        ->addIndexColumn()
        ->make(true);
    }
    public function files(Request $request)
    {
        return DataTables::of(Report_file::where('id_report', $request->id)->get())
        ->addColumn('action', function($item){
            return '
            <a href="' . route('laporan.view.edit', $item->id) . '" class="btn btn-warning text-white edit"><i class="fas fa-pencil-alt"></i></a> 
            <a href="' . route('laporan.files.delete', $item->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
            <a href="' . $item->file . '" class="btn btn-success text-white"><i class="fas fa-file-pdf"></i></a>
            ';
        })
        ->addIndexColumn()
        ->make(true);
    }
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
        ];

        $message = [
            'name.required' => 'Judul tidak boleh kosong',
            'name.max' => 'Judul terlalu panjang, maksimal 100 karakter',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $program = new Report();
        $program->name = $request->name;
        $program->name = Str::slug($request->name);
        $program->save();

        return redirect()->back();
    }
    public function edit(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
        ];

        $message = [
            'name.required' => 'Judul tidak boleh kosong',
            'name.max' => 'Judul terlalu panjang, maksimal 100 karakter',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        Report::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->back();
    }
    public function delete(Request $request)
    {
        Report::where('id', $request->id)->delete();
        return redirect()->back();
    }

    #REPORT FILE
    public function add(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'thumbnail' => 'required|image',
            'file' => 'required|mimes:pdf',
        ];

        $message = [
            'name.required' => 'Judul tidak boleh kosong',
            'name.max' => 'Judul terlalu panjang, maksimal 100 karakter',
            'thumbnail.required' => 'Thumbnail tidak boleh kosong',
            'thumbnail.image' => 'Thumbnail harus berupa gambar',
            'file.required' => 'File tidak boleh kosong',
            'file.mimes' => 'File harus berupa pdf',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $photo = $request->file('thumbnail');
        if($photo){
            $photo_name = $photo->getClientOriginalName();
            $photo_rename = time() . '-' . $photo_name;
            $photo->move('img', $photo_rename);
            $photo = asset('img/' . $photo_rename);
        }

        $file = $request->file('file');
        if($file){
            $file_name = $file->getClientOriginalName();
            $file_rename = time() . '-' . $file_name;
            $file->move('files', $file_rename);
            $file = asset('files/' . $file_rename);
        }

        $add = new Report_file();
        $add->name = $request->name;
        $add->file = $file;
        $add->file_name = $file_rename;
        $add->slug = $request->name;
        $add->thumbnail = $photo;
        $add->save();

        return redirect(route('laporan.view.check', $request->segment(4)));
    }

    public function file_edit(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'thumbnail' => 'image',
            'file' => 'mimes:pdf',
        ];

        $message = [
            'name.required' => 'Judul tidak boleh kosong',
            'name.max' => 'Judul terlalu panjang, maksimal 100 karakter',
            'thumbnail.image' => 'Thumbnail harus berupa gambar',
            'file.required' => 'File tidak boleh kosong',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $data = [
            'name' => $request->name,
        ];

        $photo = $request->file('thumbnail');
        if($photo){
            $photo_name = $photo->getClientOriginalName();
            $photo_rename = time() . '-' . $photo_name;
            $photo->move('img', $photo_rename);
            $photo = asset('img/' . $photo_rename);

            $data['thumbnail'] = $photo;
        }

        $file = $request->file('file');
        if($file){
            $file_name = $file->getClientOriginalName();
            $file_rename = time() . '-' . $file_name;
            $file->move('files', $file_rename);
            $file = asset('files/' . $file_rename);

            $data['file'] = $file;
        }

        Report_file::where('id', $request->id)->update($data);

        return redirect(route('laporan.view.check', $request->segment(4)));
    }

    public function delete_files(Request $request)
    {
        Report_file::where('id', $request->id)->delete();
        return redirect()->back();
    }
}
