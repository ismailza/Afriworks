<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about-us', 'about')->name('about');

    Route::get('/services', 'services')->name('services.index');
    Route::get('/services/{service:slug}', 'showService')->name('services.show');
    Route::post('/services/request', 'storeServiceRequest')->name('services.request');

    Route::get('/projects', 'projects')->name('projects.index');
    Route::get('/projects/{project:slug}', 'showProject')->name('projects.show');

    Route::get('/blogs', 'blogs')->name('blogs.index');
    Route::get('/blogs/category/{category:slug}', 'blogsByCategory')->name('blogs.category');
    Route::get('/blogs/{post:slug}', 'showBlog')->name('blogs.show');

    Route::get('/contact-us', 'contact')->name('contact');
    Route::post('/contact-us/send', 'storeContact')->name('contact.store');
});

Route::controller(\App\Http\Controllers\LanguageController::class)->group(function () {
    Route::post('/language/change', 'changeLanguage')->name('language.change');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/* storage link in host */
Route::get('/storage-link', function () {
    $targetFolder =  $_SERVER['DOCUMENT_ROOT'].'/myapp/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder,$linkFolder);
});
