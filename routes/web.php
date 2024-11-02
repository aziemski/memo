<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


Route::get('/',[EventController::class,'index'])->name('index');
Route::get('/timeline',[EventController::class,'timeline'])->name('timeline');


Route::get('/hello', function () {
    return view('hello');
});


Route::get('/events',[EventController::class,'index'])->name('events.index');

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


