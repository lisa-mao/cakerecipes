<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        @dump(\Auth::check());

        $recipes = Recipe::all();
        @dump($recipes);
        return view('home', compact('recipes'));
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
