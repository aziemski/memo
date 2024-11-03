<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Auth
Route::get('/login',[AuthController::class,'showLogin'])->name('showLogin');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/signup',[AuthController::class,'showSignup'])->name('showSignup');
Route::post('/signup',[AuthController::class,'signup'])->name('signup');

Route::get('/users',[UserController::class,'get'])->name('users');

Route::get('/',[EventController::class,'home'])->name('home');


// Create
Route::get('/events/create',[EventController::class,'create'])->name('events.create');
Route::post('/events/store',[EventController::class,'store'])->name('events.store');

// Retrieve
Route::get('/events/{event}',[EventController::class,'show'])->name('events.show');

// Update
Route::get('/events/{event}/edit',[EventController::class,'edit'])->name('events.edit');
Route::put('/events/{event}',[EventController::class,'update'])->name('events.update');

// Delete
Route::delete('/events/delete/{event}',[EventController::class,'delete'])->name('events.delete');


