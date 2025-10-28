<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'Home'])->name('home');

Route::get('/about-us', [HomeController::class, 'About_us'])->name('about-us');

Route::get('/contact', [HomeController::class, 'Contact'])->name('contact');


Route::get('/dashboard', [HomeController::class, 'Dashboard'])->name('dashboard')
    ->middleware(['auth', 'verified']);

Route::get('/my-recipes', [HomeController::class, 'My_recipes'])->name('my-recipes')
    ->middleware(['auth', 'verified']);





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
