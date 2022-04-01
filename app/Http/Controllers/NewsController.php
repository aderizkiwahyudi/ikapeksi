<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\News_category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class NewsController extends Controller
{
    public function view_index()
    {
        return view('administrator.news.index');
    }

    public function view_add()
    {
        $categories = Category::get();
        return view('administrator.news.add', compact('categories'));
    }
    
    public function view_edit(Request $request)
    {
        $news = News::where('id', $request->id)->firstOrFail();
        $categories = Category::get();
        $categories_selected = News_category::where('id_news', $request->id)->get();

        $cs = [];
        foreach($categories_selected as $item){
            $cs[] = $item->id_categories;
        }

        return view('administrator.news.edit', compact('news', 'categories', 'cs'));
    }

    public function index()
    {
        return Datatables::of(News::query())
        ->addColumn('action', function($news){
            return '<a href="' . route('news.view.edit', $news->id) . '" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a> <a href="' . route('news.view.delete', $news->id) . '" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>';
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
        ];

        $message = [
            'title.required' => 'Judul tidak boleh kosong',
            'title.max' => 'Judul terlalu panjang, maksimal 100 karakter',
            'thumbnail.required' => 'Thumbnail tidak boleh kosong',
            'thumbnail.image' => 'Thumbnail harus berupa gambar', 
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

        $news = new News();
        $news->title = $request->title;
        $news->thumbnail = $photo;
        $news->text = $request->text;
        $news->slug = Str::slug($request->title);
        $news->save();

        $get = News::latest()->first();

        foreach($request->categories as $item){
            $categories = new News_category();
            $categories->id_news = $get->id;
            $categories->id_categories = $item;
            $categories->save();
        }

        return redirect(route('news.view.index'));
    }

    public function edit(Request $request)
    {
        $rules = [
            'title' => 'required|max:100',
            'text' => 'required',
            'thumbnail' => 'image',
        ];

        $message = [
            'title.required' => 'Judul tidak boleh kosong',
            'title.max' => 'Judul terlalu panjang, maksimal 100 karakter',
            'thumbnail.image' => 'Thumbnail harus berupa gambar', 
        ];

        $validation = Validator::make($request->all(), $rules, $message);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $photo = $request->file('thumbnail');
        
        $data = [
            'title' => $request->title,
            'text' => $request->text,
            'slug' => Str::slug($request->title),
        ];

        if($photo){
            $photo_name = $photo->getClientOriginalName();
            $photo_rename = time() . '-' . $photo_name;
            $photo->move('img', $photo_rename);
            $data['thumbnail'] = asset('img/' . $photo_rename);
        }

        News::where('id', $request->id)->update($data);

        News_category::where('id_news', $request->id)->delete();
        foreach($request->categories as $item){
            $categories = new News_category();
            $categories->id_news = $request->id;
            $categories->id_categories = $item;
            $categories->save();
        }

        return redirect(route('news.view.index'));
    }

    public function delete(Request $request)
    {
        News::where('id', $request->id)->delete();
        News_category::where('id_news', $request->id)->delete();
        return back();
    }
}
