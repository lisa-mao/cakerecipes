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

        //check
        if (!$recipe) {
            redirect('/');
        }

        return view('/recipes/show', compact('recipe'));


    }


    public function store(Request $request)

    {

//        if(auth()->user()->isAdmin()){

//        }
        //validation
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

        $recipe->save(); // Save the recipe to get an ID

        //use validated data or else default to an empty array
        $selectedCategories = $validatedData['category'] ?? [];

        if (!empty($validatedData))
            $categoryIds = [];

        //loop through each selected category value
        foreach ($selectedCategories as $categorySlug) {

            //format the slug into readable name
            $formattedName = Str::title(str_replace('-', ' & ', $categorySlug));

            //find the category by name else create it
            $category = Category::firstOrCreate(
                ['name' => $formattedName]
            );

            //collect the id of the existing or newly created category
            $categoryIds[] = $category->id;

            //attach all found/created category ids to the newly created recipe
            //this inserts rows into the 'category_recipe' pivot table
            $recipe->categories()->sync($categoryIds);

        }
        return redirect()->route('home')
            ->with('Success', 'Recipe published successfully!');

    }


//
//
    public function Create()
    {

//        $categories = Category::all();
        return view('recipes.create');
    }

    private function isAuthorizedToModify(Recipe $recipe): bool
    {
        // Safety check: if no user is authenticated, deny access.
        if (!Auth::check()) {
            return false;
        }

        // 1. Check if the user is an ADMIN (role = 1)
        // If the user's 'role' column is 1, they are authorized.
        if (Auth::user()->role === 1) {
            return true;
        }

        // 2. Check if the user is the OWNER
        // If the authenticated user's ID matches the recipe's user_id, they are authorized.
        if (Auth::id() === $recipe->user_id) {
            return true;
        }

        // 3. If neither Admin nor Owner, deny access
        return false;
    }


    public function Edit(Request $request, Recipe $recipe, User $user)
    {

        if (!$this->isAuthorizedToModify($recipe)) {
            return redirect()->route('home', $recipe)
                ->with('error', 'You are not authorized to edit this recipe.');
        } else

            // Eager load the categories relationship to retrieve the recipe and its current categories
            $recipe = Recipe::with('categories')->find($recipe->id);

        // Get all available categories (assuming this returns a Collection of Category models)
        $categories = Category::all();


        //get all categories names associated with the recipe
        $currentCategoryNames = $recipe->categories->pluck('name')->toArray();

        // Pass all necessary variables to the view
        @dump($categories, $currentCategoryNames);
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

        // 2. Wrap the update and sync in a database transaction
        // This ensures the recipe update commits the ID before the sync runs.
        DB::transaction(function () use ($request, $recipe) {

            // 2a. Update the main Recipe fields
            $recipe->update($request->except('category'));

            // 2b. Handle Category Synchronization (Pivot Table Update)
            $submittedCategoryNames = $request->category ?? [];

            if (!empty($submittedCategoryNames)) {
                // Convert the submitted names (slugs) back into IDs from the database
                $categoryIds = Category::whereIn('name', $submittedCategoryNames)->pluck('id');

                // Synchronize the pivot table: detach removed categories, attach new ones.
                $recipe->categories()->sync($categoryIds);
            } else {
                // If no categories were submitted, detach all categories
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
