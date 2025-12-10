<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

// Language switching route
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'kn'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

// Main routes
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/programs', function () {
    return view('pages.programs');
})->name('programs');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
