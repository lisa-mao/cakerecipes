<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'Home'])->name('home');

Route::get('/contact-page', [HomeController::class, 'Contact'])->name('contact');

Route::get('/about-us', [HomeController::class, 'About_us'])->name('about_us');


Route::get('/recipes/show', [RecipeController::class, 'show'])->name('show');


Route::get('/recipes/create', [RecipeController::class, 'store'])->name('create');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
