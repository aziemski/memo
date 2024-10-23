<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});


Route::get('/events',[EventController::class,'index'])->name('events.index');
Route::get('/events/create',[EventController::class,'create'])->name('events.create');
Route::post('/events/store',[EventController::class,'store'])->name('events.store');
Route::delete('/events/delete/{event}',[EventController::class,'delete'])->name('events.delete');

Route::get('/events/{event}/edit',[EventController::class,'edit'])->name('events.edit');
Route::put('/events/{event}',[EventController::class,'update'])->name('events.update');
