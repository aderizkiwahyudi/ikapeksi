<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShowNews;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('homePage');
Route::get('/news', [HomeController::class, 'news'])->name('newsPage');
Route::get('/news/{slug}', [HomeController::class, 'news_detail'])->name('newsPageDetail');
Route::get('/categories/{slug}', [HomeController::class, 'categories'])->name('newsCategories');

Route::get('/event', [HomeController::class, 'event'])->name('eventPage');
Route::get('/event/{slug}', [HomeController::class, 'event_detail'])->name('eventPageDetail');
Route::post('/event/registration', [HomeController::class, 'event_registration'])->name('eventRegistration');

Route::get('/laporan', [HomeController::class, 'report'])->name('reportPage');
Route::get('/laporan/{slug}', [HomeController::class, 'report_detail'])->name('reportPageDetail');

Route::get('/galeri/all', [HomeController::class, 'gallery'])->name('galleryPage');
Route::get('/galeri/view/{slug}', [HomeController::class, 'galleryDetail'])->name('galleryDetailPage');

Route::get('/page/{slug}', [HomeController::class, 'pages'])->name('pagesPage');

#ADMIN ROUTER
Route::group(['prefix' => 'administrator'], function(){
    Route::get('/', [AdministratorController::class, 'index'])->name('login');
    Route::post('/', [AdministratorController::class, 'loginProses'])->name('loginProses');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');
        
        Route::group(['prefix' => 'news'], function(){
            Route::get('/', [NewsController::class, 'view_index'])->name('news.view.index');   
            Route::get('/add', [NewsController::class, 'view_add'])->name('news.view.create');   
            Route::post('/add', [NewsController::class, 'create'])->name('news.view.create.prosess');   
            Route::get('/edit/{id}', [NewsController::class, 'view_edit'])->name('news.view.edit');   
            Route::post('/edit/{id}', [NewsController::class, 'edit'])->name('news.view.edit.prosess');   
            Route::get('/delete/{id}', [NewsController::class, 'delete'])->name('news.view.delete');   
        });

        Route::group(['prefix' => 'program'], function(){
            Route::get('/', [ProgramController::class, 'view_index'])->name('program.view.index');
            Route::post('/', [ProgramController::class, 'create'])->name('program.create');
            Route::post('/edit/{id}', [ProgramController::class, 'edit'])->name('program.edit');
            Route::get('/delete/{id}', [ProgramController::class, 'delete'])->name('program.delete');
        });

        Route::group(['prefix' => 'review'], function(){
            Route::get('/', [ReviewController::class, 'view_index'])->name('review.view.index');
            Route::post('/', [ReviewController::class, 'create'])->name('review.create');
            Route::post('/edit/{id}', [ReviewController::class, 'edit'])->name('review.edit');
            Route::get('/delete/{id}', [ReviewController::class, 'delete'])->name('review.delete');
        });

        Route::group(['prefix' => 'laporan'], function(){
            Route::get('/', [ReportController::class, 'view_index'])->name('laporan.view.index');
            Route::post('/', [ReportController::class, 'create'])->name('laporan.create');
            Route::post('/edit/{id}', [ReportController::class, 'edit'])->name('laporan.edit');
            Route::get('/delete/{id}', [ReportController::class, 'delete'])->name('laporan.delete');
            Route::get('/check/{id}', [ReportController::class, 'view_check'])->name('laporan.view.check');

            Route::get('/check/add/{id}', [ReportController::class, 'view_add'])->name('laporan.view.add');
            Route::post('/check/add/{id}', [ReportController::class, 'add'])->name('laporan.view.add.prosess');

            Route::get('/check/edit/{id}', [ReportController::class, 'view_edit'])->name('laporan.view.edit');
            Route::post('/check/edit/{id}', [ReportController::class, 'file_edit'])->name('laporan.files.edit.proses');
            
            Route::get('/check/delete/{id}', [ReportController::class, 'delete_files'])->name('laporan.files.delete');
        });

        Route::group(['prefix' => 'event'], function(){
            Route::get('/', [EventController::class, 'view_index'])->name('event.view.index');   
            Route::get('/add', [EventController::class, 'view_add'])->name('event.view.create');   
            Route::post('/add', [EventController::class, 'create'])->name('event.view.create.prosess');   
            Route::get('/edit/{id}', [EventController::class, 'view_edit'])->name('event.view.edit');   
            Route::post('/edit/{id}', [EventController::class, 'edit'])->name('event.view.edit.prosess');   
            Route::get('/delete/{id}', [EventController::class, 'delete'])->name('event.view.delete');   
            Route::get('/participant/{id}', [EventController::class, 'view_participant'])->name('event.view.participant');   
        });

        Route::group(['prefix' => 'galeri'], function(){
            Route::get('/', [GalleryController::class, 'view_index'])->name('galeri.view.index');   
            
            Route::get('/add', [GalleryController::class, 'view_add'])->name('galeri.view.create');   
            Route::post('/add', [GalleryController::class, 'create'])->name('galeri.view.create.proses'); 

            Route::get('/edit/{id}', [GalleryController::class, 'view_edit'])->name('galeri.view.edit');   
            Route::post('/edit/{id}', [GalleryController::class, 'edit'])->name('galeri.view.edit.prosess');
            
            Route::post('/add/photo/{id}', [GalleryController::class, 'photo_add'])->name('add.photo');

            Route::get('/delete/{id}', [GalleryController::class, 'delete'])->name('galeri.view.delete');   
            Route::get('/delete/photo/{id}', [GalleryController::class, 'photo_delete'])->name('photo.delete');   
        });

        Route::get('/page/pendaftaran-online', [PageController::class, 'view_register'])->name('page.view.register');
        Route::post('/page/pendaftaran-online', [PageController::class, 'register'])->name('page.register');

        Route::get('/page/{slug}', [PageController::class, 'view_edit'])->name('page.view.edit');
        Route::post('/page/{slug}', [PageController::class, 'edit'])->name('page.edit');

        Route::get('/pengaturan', [DashboardController::class, 'view_pengaturan'])->name('pengaturan.view.edit');
        Route::post('/pengaturan', [DashboardController::class, 'pengaturan'])->name('pengaturan.edit');

        Route::get('/pengaturan-web', [DashboardController::class, 'view_pengaturan_web'])->name('pengaturan.web.view.edit');
        Route::post('/pengaturan-web', [DashboardController::class, 'pengaturan_web'])->name('pengaturan.web.edit');
        
        Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

        Route::group(['prefix' => 'api'], function(){
            Route::get('/event', [EventController::class, 'index'])->name('event.index');
            Route::get('/event/participant/{id}', [EventController::class, 'getParticipant'])->name('event.participant');
            Route::get('/news', [NewsController::class, 'index'])->name('news.index');
            Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
            Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
            Route::get('/laporan/{id}', [ReportController::class, 'files'])->name('laporan.files.index');
            Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
            Route::get('/galeri/{id}', [GalleryController::class, 'getPhotos'])->name('galeri.photo.index');
            Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
        });
    });
});

