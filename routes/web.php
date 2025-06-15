<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about_us');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/login', function () {
    return view('login-signup');
});
Route::get('/candidates', function () {
    return view('candidates');
});
