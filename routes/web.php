<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });




use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');





use App\Http\Controllers\EventController;

Route::get('/evenements', [EventController::class, 'index'])->name('events.index');
