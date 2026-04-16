<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Str;
use Throwable;
use function Pest\Laravel\hasCredentials;

class RecipeController extends Controller
{


    public function Show($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            redirect('/');
        }
        return view('/recipes/show', compact('recipe'));
    }

    public function store(Request $request)

    {
        $validatedData = $request->validate([

            'title' => 'required|max:25|string',
            'description' => 'required|max:100|string',

            'total_time' => 'required|integer',
            'prep_time' => 'required|integer',
            'serving' => 'required|max:100|integer',

            'category' => 'nullable|array',
            'category.*' => 'string|max:50'
        ]);

        if (!auth()->check()) {
            return redirect()->route('home');
        }

        $recipe = new Recipe();
        $recipe->user_id = auth()->id();
        $recipe->title = $validatedData['title'];
        $recipe->description = $validatedData['description'];
        $recipe->total_time = $validatedData['total_time'];
        $recipe->prep_time = $validatedData['prep_time'];
        $recipe->serving = $validatedData['serving'];

        $recipe->save();

        $selectedCategories = $validatedData['category'] ?? [];

        if (!empty($validatedData))
            $categoryIds = [];

        foreach ($selectedCategories as $categorySlug) {

            $formattedName = Str::title(str_replace('-', ' & ', $categorySlug));
            $category = Category::firstOrCreate(
                ['name' => $formattedName]
            );

            $categoryIds[] = $category->id;
            $recipe->categories()->sync($categoryIds);
        }
        return redirect()->route('home')
            ->with('Success', 'Recipe published successfully!');
    }

    public function Create()
    {
        return view('recipes.create');
    }

    private function isAuthorizedToModify(Recipe $recipe): bool
    {
        if (!Auth::check()) {
            return false;
        }

        if (Auth::user()->role === 1) {
            return true;
        }

        if (Auth::id() === $recipe->user_id) {
            return true;
        }

        return false;
    }


    public function Edit(Request $request, Recipe $recipe, User $user)
    {

        if (!$this->isAuthorizedToModify($recipe)) {
            return redirect()->route('home', $recipe)
                ->with('error', 'You are not authorized to edit this recipe.');
        } else

            $recipe = Recipe::with('categories')->find($recipe->id);
        $categories = Category::all();
        $currentCategoryNames = $recipe->categories->pluck('name')->toArray();

        return view('recipes.edit', compact('recipe', 'categories', 'currentCategoryNames'));
    }


    /**
     * @throws Throwable
     */
    public
    function Update(Request $request, Recipe $recipe)
    {
        $validatedData = $request->validate([

            'title' => 'required|max:25|string',
            'description' => 'required|max:100|string',

            'total_time' => 'required|integer',
            'prep_time' => 'required|integer',
            'serving' => 'required|max:100|integer',

            'category' => 'nullable|array',
            'category.*' => 'string|max:50'
        ]);

        DB::transaction(function () use ($request, $recipe) {

            $recipe->update($request->except('category'));

            $submittedCategoryNames = $request->category ?? [];

            if (!empty($submittedCategoryNames)) {
                $categoryIds = Category::whereIn('name', $submittedCategoryNames)->pluck('id');
                $recipe->categories()->sync($categoryIds);
            } else {
                $recipe->categories()->sync([]);
            }
        });

        return redirect()->route('home')
            ->with('success', 'Post updated successfully.!!');
    }

    public function Destroy(Recipe $recipe)
    {
        if (!static::isAuthorizedToModify($recipe)) {
            return redirect()->route('home', $recipe)
                ->with('error', 'You are not authorized to delete this recipe.');
        }


        Recipe::find($recipe);
        $recipe->delete();
        return redirect()->route('home')
            ->with('success', 'Post deleted successfully');


    }

    public function ToggleStatus(Recipe $recipe)
    {
        if (auth()->user()->role !== 1) {
            return redirect()->route('home', $recipe)
                ->with('error', 'You are not authorized to delete this recipe.');
        }

        $recipe->is_active = !$recipe->is_active;
        $recipe->save();

        $recipe->refresh();

        return redirect()->route('dashboard', compact('recipe'));
    }


}
