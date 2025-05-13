<?php

use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
    ->controller(ProfileController::class)
    ->prefix('profile')
    ->name('profile.')
    ->group(function() {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

Route::patch('/details', DetailsController::class)
    ->name('details.update')->middleware('auth');

Route::middleware('auth')
    ->controller(UploadController::class)
    ->prefix('upload')
    ->name('upload.')
    ->group(function() {
        Route::patch('/image', 'image')->name('image');
        Route::patch('/cover', 'cover')->name('cover');
    });

require __DIR__.'/auth.php';
