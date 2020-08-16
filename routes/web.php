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
  $r->get('/about', 'PageController@about')->name('about');
  $r->get('/test', 'PageController@about')->name('test');
});

Route::get('/home', function () {
  return redirect()->route('index');
});

Route::get('/index', function () {
  return redirect()->route('index');
});

Route::get('/contact', function () {
  return view('climb-template.pages.contact');
})->name('contact');

Route::get('/news', function () {
  return view('climb-template.pages.news');
})->name('news');