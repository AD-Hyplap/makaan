<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contacts');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/testimonal', function () {
    return view('testimonal');
})->name('testimonal');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');



Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');