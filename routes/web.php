<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\VoteController;

Route::get('/', [ElectionController::class, 'showHome'])->name('home');

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

Route::get('/elections', [ElectionController::class, 'index'])->name('election.index');
Route::post('/elections', [ElectionController::class, 'store'])->name('election.store');
Route::delete('/elections/{id}', [ElectionController::class, 'destroy'])->name('election.destroy');
Route::post('/election/store', [ElectionController::class, 'store'])->name('election.store');



Route::post('/vote', [VoteController::class, 'store'])->name('vote');