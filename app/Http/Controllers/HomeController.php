<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Database\Factories\CategoryFactory;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use function Laravel\Prompts\select;
use function Pest\Laravel\get;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function Home()
    {
        $query = Recipe::orderBy('created_at', 'desc');

        @dump(\Auth::check());
        //search filter
        if (request()->has('search')) {
            //column name:where specific in the column,
            // operator: a string that specifies the comparison operator, like = searches for part of the string given
            // value = the value that the column must be compared against
            //% sql wildcard (match any sequence of zero or more characters)
            $query = $query->where('title', 'like', '%' . request()->get('search') . '%');
        }

        //category filter
        if (request()->has('categories')) {
            //get array of the selected categories
            $selectedCategories = request('categories');

            //wherehas defines where the relationship is in query(all recipes) with categories (recipe_categories)
            //builder $q lays a constraint into the relationship
            //wherein checks if the user clicked on the id thats inside the category_ids
            $query = $query->whereHas('categories', function (Builder $q) use ($selectedCategories) {
                $q->whereIn('category_id', $selectedCategories);

            });

        }

        //execute final query, eager loading the user relationship and paginate
        $recipes = $query->with('user')->paginate(9);

        //fetch all category labels for the filter labels
        $categories = Category::all();

        return view('home', compact('recipes', 'categories'));
    }

    public function Dashboard()
    {
        $query = Recipe::orderBy('created_at', 'desc');


        //search filter
        if (request()->has('search')) {
            //column name:where specific in the column,
            // operator: a string that specifies the comparison operator, like = searches for part of the string given
            // value = the value that the column must be compared against
            //% sql wildcard (match any sequence of zero or more characters)
            $query = $query->where('title', 'like', '%' . request()->get('search') . '%');
        }

        //category filter
        if (request()->has('categories')) {
            //get array of the selected categories
            $selectedCategories = request('categories');

            //wherehas defines where the relationship is in query(all recipes) with categories (recipe_categories)
            //builder $q lays a constraint into the relationship
            //wherein checks if the user clicked on the id thats inside the category_ids
            $query = $query->whereHas('categories', function (Builder $q) use ($selectedCategories) {
                $q->whereIn('category_id', $selectedCategories);

            });

        }

        //execute final query, eager loading the user relationship and paginate
        $recipes = $query->with('user')->paginate(9);

        //fetch all category labels for the filter labels
        $categories = Category::all();

        return view('dashboard', compact('recipes', 'categories'));

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
