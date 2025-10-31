<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Database\Factories\CategoryFactory;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use function Pest\Laravel\get;

class HomeController extends Controller
{
    public function Home()
    {
        @dump(\Auth::check());

        $recipes = Recipe::with('user')->get();
        $categories = Category::all();

        return view('home', compact('recipes', 'categories'));
    }
    public function Dashboard()
    {
        return view('dashboard');
    }


    public function Contact()
    {
        return view('contact-page');
    }

    public function About_us()
    {
        return view('about-us');
    }

    public function Log_in()
    {
        return view('auth.login');
    }

    public function Register()
    {
        return view('/auth.register');
    }

    public function create()
    {
        return view('/recipes/create');
    }


    public function My_recipes()
    {
        return view('/my-recipes');
    }


}
