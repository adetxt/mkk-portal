<?php

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


Route::group([
    'namespace' => 'v1'
], function ($r) {
    $r->get('/', 'PageController@index')->name('index');
    $r->get('/home', 'PageController@index');
    $r->get('/index', 'PageController@index');
    
    $r->get('/about', 'PageController@about')->name('about');
    $r->get('/news', 'PageController@news')->name('news');
    $r->get('/news/{slug}/{id}', 'PageController@news')->name('news.detail');
    $r->get('/contact', 'PageController@contact')->name('contact');
    $r->get('/career', 'PageController@career')->name('career');
    $r->get('/gallery', 'PageController@gallery')->name('gallery');
    $r->get('/gallery/{slug}/{id}', 'PageController@gallery')->name('gallery.detail');
    $r->get('/test', 'PageController@about')->name('test');
});

// Route::get('/home', function () {
//     return redirect()->route('index');
// });

// Route::get('/index', function () {
//     return redirect()->route('index');
// });
