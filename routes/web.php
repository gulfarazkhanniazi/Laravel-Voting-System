<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::post('/login', [userController::class, 'login'])->name('login');
Route::post('/register', [userController::class, 'register'])->name('register');
Route::post('/logout', [userController::class, 'logout'])->name('logout');