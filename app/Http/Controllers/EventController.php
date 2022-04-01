<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use App\Models\Event_registration;
use App\Models\News;
use App\Models\News_category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class EventController extends Controller
{
    public function view_index()
    {
        return view('administrator.event.index');
    }

    public function view_add()
    {
        $categories = Category::get();
        return view('administrator.event.add', compact('categories'));
    }
    
    public function view_edit(Request $request)
    {
        $event = Event::where('id', $request->id)->firstOrFail();
        return view('administrator.event.edit', compact('event'));
    }

    public function view_participant(Request $request)
    {
        return view('administrator.event.participant');
    }

    public function getParticipant(Request $request)
    {
        return Datatables::of(Event_registration::where('id_event', $request->id)->get())
        ->addIndexColumn()
        ->make(true);
    }

    public function index()
    {
        return Datatables::of(Event::query())
        ->addColumn('action', function($item){
            return '
            <a href="' . route('event.view.edit', $item->id) . '" class="btn btn-warning text-white w-100 mb-1"><i class="fas fa-pencil-alt"></i></a> 
            <a href="' . route('event.view.delete', $item->id) . '" class="btn btn-danger text-white w-100 mb-1"><i class="fas fa-trash"></i></a>
            <a href="' . route('event.view.participant', $item->id) . '" class="btn btn-success text-white w-100"><i class="fas fa-users"></i></a>';
        })
        ->addIndexColumn()
        ->make(true);
    }

    public function create(Request $request)
    {
        $rules = [
            'title' => 'required|max:100',
            'text' => 'required',
            'thumbnail' => 'required|image',
            'start_at' => 'required',
            'end_at' => 'required',
            'location' => 'required',
        ];

        $message = [
            'title.required' => 'Judul tidak boleh kosong',
            'title.max' => 'Judul terlalu panjang, maksimal 100 karakter',
            'thumbnail.required' => 'Thumbnail tidak boleh kosong',
            'thumbnail.image' => 'Thumbnail harus berupa gambar', 
            'start_at.required' => 'Tanggal Mulai tidak boleh kosong',
            'end_at.required' => 'Tanggal Selesai tidak boleh kosong',
            'location.required' => 'Lokasi tidak boleh kosong',
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

        $event = new Event();
        $event->title = $request->title;
        $event->thumbnail = $photo;
        $event->text = $request->text;
        $event->start_at = $request->start_at;
        $event->end_at = $request->end_at;
        $event->location = $request->location;
        $event->slug = Str::slug($request->title);
        $event->save();

        return redirect(route('event.view.index'));
    }

    public function edit(Request $request)
    {
        $rules = [
            'title' => 'required|max:100',
            'text' => 'required',
            'thumbnail' => 'image',
            'start_at' => 'required',
            'end_at' => 'required',
            'location' => 'required',
        ];

        $message = [
            'title.required' => 'Judul tidak boleh kosong',
            'title.max' => 'Judul terlalu panjang, maksimal 100 karakter',
            'thumbnail.image' => 'Thumbnail harus berupa gambar', 
            'start_at.required' => 'Tanggal Mulai tidak boleh kosong',
            'end_at.required' => 'Tanggal Selesai tidak boleh kosong',
            'location.required' => 'Lokasi tidak boleh kosong',
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $photo = $request->file('thumbnail');
        
        $data = [
            'title' => $request->title,
            'text' => $request->text,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'location' => $request->location,
            'slug' => Str::slug($request->title),
        ];

        if($photo){
            $photo_name = $photo->getClientOriginalName();
            $photo_rename = time() . '-' . $photo_name;
            $photo->move('img', $photo_rename);
            $data['thumbnail'] = asset('img/' . $photo_rename);
        }

        Event::where('id', $request->id)->update($data);

        return redirect(route('event.view.index'));
    }

    public function delete(Request $request)
    {
        Event::where('id', $request->id)->delete();
        return back();
    }
}
