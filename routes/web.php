<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;



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


