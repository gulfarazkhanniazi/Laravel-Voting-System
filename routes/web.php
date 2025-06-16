<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidateController;

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

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');
Route::post('/candidates', [CandidateController::class, 'add'])->name('add');
Route::delete('/candidates/{candidate}', [CandidateController::class, 'destroy'])->name('candidate.destroy');