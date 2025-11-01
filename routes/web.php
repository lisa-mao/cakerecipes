<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//returns all recipes
Route::get('/', [HomeController::class, 'Home'])->name('home');

Route::get('/about-us', [HomeController::class, 'About_us'])->name('about-us');

Route::get('/contact', [HomeController::class, 'Contact'])->name('contact');


Route::get('/dashboard', [HomeController::class, 'Dashboard'])->name('dashboard')
    ->middleware(['auth', 'verified']);


//returns all recipes linked to the logged in user
Route::get('/my-recipes', [HomeController::class, 'My_recipes'])->name('my-recipes')
    ->middleware(['auth', 'verified']);


//returns the form for creating a recipe
Route::get('recipes/create', [RecipeController::class, 'Create'])->name('recipes/create')
    ->middleware(['auth', 'verified']);

//adds a post to the database
Route::post('recipes/store', [RecipeController::class, 'Store'])->name('recipes/store')
    ->middleware(['auth', 'verified']);

//returns a page with the full recipe with dynamic part = {recipe}
Route::get('recipes/show/{recipe}', [RecipeController::class, 'Show'])->name('recipes/show')
    ->middleware(['auth', 'verified']);
//returns the form for editing a recipe
Route::get('recipes/edit/{recipe}', [RecipeController::class, 'Edit'])->name('recipes/edit')
    ->middleware(['auth', 'verified']);

////updates a recipe
Route::get('recipes/update', [RecipeController::class, 'Update'])->name('recipes/update')
    ->middleware(['auth', 'verified']);
//deletes a recipe
Route::delete('recipes/{recipe}', [RecipeController::class, 'Destroy'])->name('recipes/destroy')
    ->middleware(['auth', 'verified']);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
