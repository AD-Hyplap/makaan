<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubCategoryController;

Route::get('/',[HomeController::class, 'home'])->name('home');

Route::view('/contact', 'contact')->name('contacts');
Route::view('/about', 'about')->name('about');

Route::get('/{category}/{subCategory}', [SubCategoryController::class, 'getSubCategory']);

Route::redirect('/login', '/');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware('auth')->group(function(){
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});
