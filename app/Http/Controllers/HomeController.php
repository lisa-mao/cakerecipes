<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use App\Models\Category;
use Database\Factories\CategoryFactory;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use function Laravel\Prompts\select;
use function Pest\Laravel\get;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    private const minCommentsForUpload = 5;

    public static function getMinCommentsForUpload(): int
    {
        return self::minCommentsForUpload;
    }
    public function Home()
    {
        $query = Recipe::orderBy('created_at', 'desc');

        $canUploadRecipe = false;
        $commentCount = 0; //default
        $minComments = self::minCommentsForUpload;

        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 1) {
                $canUploadRecipe = true;
            } else {


                $commentCount = Comment::where('user_id', $user->id)->count();

                if ($commentCount >= self::minCommentsForUpload) {
                    $canUploadRecipe = true;
                }
            }
        }
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

        return view('home', compact('recipes', 'categories', 'canUploadRecipe', 'commentCount','minComments'));
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
