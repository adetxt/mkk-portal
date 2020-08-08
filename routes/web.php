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

Route::get('/', function () {
  return view('climb-template.pages.index');
})->name('index');

Route::get('/home', function () {
  return redirect()->route('index');
});

Route::get('/index', function () {
  return redirect()->route('index');
});

Route::get('/about', function () {
  return view('climb-template.pages.about');
})->name('about');

Route::get('/contact', function () {
  return view('climb-template.pages.contact');
})->name('contact');