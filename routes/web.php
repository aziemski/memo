<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Auth
Route::get('/login',[AuthController::class,'loginShow'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.store');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/signup',[AuthController::class,'signupShow'])->name('signup');
Route::post('/signup',[AuthController::class,'signup'])->name('signup.store');



Route::get('/',[EventController::class,'home'])->name('home');

Route::get('/categories',[CategoryController::class,'categories'])->name('categories');

Route::middleware(['auth'])->group(function () {
    Route::get('/events/create',[EventController::class,'create'])->name('events.create');
    Route::post('/events/store',[EventController::class,'store'])->name('events.store');

    Route::get('/events/{event}/edit',[EventController::class,'edit'])->name('events.edit');
    Route::put('/events/{event}',[EventController::class,'update'])->name('events.update');

    Route::delete('/events/delete/{event}',[EventController::class,'delete'])->name('events.delete');

    Route::get('/users',[UserController::class,'allShow'])->name('users');
    Route::get('/users/me',[UserController::class,'meShow'])->name('users.me');
});
