<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Event_registration;
use App\Models\Gallery;
use App\Models\News;
use App\Models\News_category;
use App\Models\Page;
use App\Models\Photo;
use App\Models\Report;
use App\Models\Report_file;
use App\Models\Review;
use App\Models\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::limit(5)->orderBy('created_at', 'DESC')->get();
        $event = Event::limit(5)->orderBy('created_at', 'DESC')->get();
        $review = Review::limit(5)->orderBy('created_at', 'DESC')->get();
        $web = Web::limit(5)->orderBy('created_at', 'DESC')->first();

        return view('home', compact('news', 'event', 'review', 'web'));
    }

    public function news(Request $request)
    {
        $jumlahPerPage = 12;
        $news = News::latest()->simplepaginate($jumlahPerPage);
        $total = News::get();
        $lastPage = ceil(count($total)/$jumlahPerPage);

        return view('news', compact('news', 'lastPage', 'jumlahPerPage', 'total'));
    }

    public function categories(Request $request)
    {
        $jumlahPerPage = 12;
        $categories = Category::where('slug', $request->slug)->firstOrFail();
        $news = News_category::where('news_categories.id_categories', $categories->id)->join('news', 'news.id', '=', 'news_categories.id_news')->orderBy('news.created_at', 'DESC')->simplepaginate($jumlahPerPage);
        $total = News_category::where('news_categories.id_categories', $categories->id)->join('news', 'news.id', '=', 'news_categories.id_news')->orderBy('news.created_at', 'DESC')->get();
        $lastPage = ceil(count($total)/$jumlahPerPage);

        return view('categories', compact('news', 'lastPage', 'jumlahPerPage', 'total'));
    }

    public function news_detail(Request $request)
    {
        $news = News::where('slug', $request->slug)->firstOrFail();
        $newsMore = News::inRandomOrder()->get();
        return view('newsDetail', compact('news', 'newsMore'));
    }

    public function event(Request $request)
    {
        $jumlahPerPage = 12;
        $event = Event::orderBy('start_at', 'DESC')->simplepaginate($jumlahPerPage);
        $total = Event::get();
        $lastPage = ceil(count($total)/$jumlahPerPage);

        return view('event', compact('event', 'lastPage', 'jumlahPerPage', 'total'));
    }

    public function event_detail(Request $request)
    {
        $event = Event::where('slug', $request->slug)->firstOrFail();
        return view('eventDetail', compact('event'));
    }

    public function event_registration(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:event_registrations',
            'company' => 'required',
        ];

        $validation = Validator::make($request->all(), $rules);

        if($validation->fails())
        {
            return json_encode([
                'success' => false,
                'message' => $validation->errors()->first(),
            ]);
        }

        $regis = new Event_registration();
        $regis->id_event = $request->id;
        $regis->name = $request->name;
        $regis->email = $request->email;
        $regis->company = $request->company;
        $regis->save();

        return json_encode([
            'success' => true,
            'message' => 'Successfully registered',
        ]);
    }

    public function report(Request $request)
    {
        $report = Report::orderBy('created_at', 'DESC')->get();
        return view('report', compact('report'));
    }

    public function report_detail(Request $request)
    {
        $report = Report::where('slug', $request->slug)->firstOrFail();
        $reports = Report_file::where('id_report', $report->id)->orderBy('created_at', 'DESC')->get();

        return view('reportDetail', compact('report', 'reports'));
    }

    public function gallery(Request $request)
    {
        $jumlahPerPage = 12;
        $gallery = Gallery::select('*', 'galleries.id AS id_gallery', 'galleries.title AS title')->join('photos', 'photos.id_gallery', '=', 'galleries.id')->orderBy('galleries.created_at', 'DESC')->groupBy('photos.id_gallery')->simplepaginate($jumlahPerPage);
        $total = Gallery::get();
        $lastPage = ceil(count($total)/$jumlahPerPage);

        return view('gallery', compact('gallery', 'lastPage', 'jumlahPerPage', 'total'));
    }

    public function galleryDetail(Request $request)
    {
        $gallery = Gallery::where('slug', $request->slug)->firstOrFail();
        $photos = Photo::where('id_gallery', $gallery->id)->get();
        return view('galleryDetail', compact('gallery', 'photos'));
    }

    public function pages(Request $request)
    {
        $page = Page::where('slug', $request->slug)->firstOrFail();
        return view('page', compact('page'));
    }
}
