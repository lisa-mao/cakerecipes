<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'Home'])->name('home');

Route::get('/contact-page', [HomeController::class, 'Contact'])->name('contact');

Route::get('/about-us', [HomeController::class, 'About_us'])->name('about_us');

Route::get('/login', [HomeController::class, 'Log_in'])->name('login');

Route::get('/register', [HomeController::class, 'Register'])->name('register');



Route::get('/recipes/create', [HomeController::class, 'create'])->name('create');

Route::post('/recipes/recipe-card', [RecipeController::class, 'store'])->name('recipes/recipe-card.create'); //creating recipes

Route::get('/recipes/show/{id}', [RecipeController::class, 'show'])->name('show'); //showing recipes





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
