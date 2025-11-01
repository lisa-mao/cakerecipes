<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Str;

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

//        if(auth()->user()->isAdmin()){

//        }
        //validation
        $validatedData = $request->validate([

            'title' => 'required|max:25|string',
            'description' => 'required|max:100|string',

            'total_time' => 'required|int',
            'prep_time' => 'required|int',
            'serving' => 'required|max:100|int',

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
            $formattedName = Str::title(str_replace('-', ' & ' , $categorySlug));

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
//
//    public function Edit($id)
//    {
//        $recipe = Recipe::find($id);
////        $categories = Category::all();
//        return view('recipes.create', compact('recipe'));
//    }
//
//
//    public function Update(Request $request, $id)
//    {
//        $request->validate([
//
//            'title' => 'required|max:100',
//            'description' => 'required|max:100',
//
//            'total_time' => 'required|max:100',
//            'prep_time' => 'required|max:100',
//            'serving' => 'required|max:100',
//
//            'category' => 'required'
//        ]);
//
//        $recipe = Recipe::find($id);
//        $recipe->update($request->all());
//
//        return redirect()->route('home')
//            ->with('success', 'Post updated successfully.');
//    }
//
//    public function Destroy($id)
//    {
//        $recipe = Recipe::find($id);
//        $recipe->delete();
//        return redirect()->route('home')
//            ->with('success', 'Post deleted successfully');
//    }
//

}
