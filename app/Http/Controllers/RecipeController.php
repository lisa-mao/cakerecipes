<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

//
//    public function Show($id)
//    {
//
//        $recipe = Recipe::find($id);
//
//        if (!$recipe) {
//            redirect('/');
//        }
//
//        return view('/recipes/show', compact('recipe'));
//
//
//    }


    public function store(Request $request)

    {

//        if(auth()->user()->isAdmin()){

//        }
        $request->validate([

            'title' => 'required|max:100|string',
            'description' => 'required|max:100|string',

            'total_time' => 'required|int',
            'prep_time' => 'required|int',
            'serving' => 'required|max:100|int',

            'category' => 'required'
        ]);

        $recipe = new Recipe();
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->total_time = $request->input('total_time');
        $recipe->prep_time = $request->input('prep_time');
        $recipe->serving = $request->input('serving');
        $recipe->category = $request->input('category');

        auth()->id();
        if (auth()->check()){
            $recipe->user_id = auth()->id();
            $recipe->save();

            return redirect()->route('home')
                ->with('Success', 'Recipe published successfully!');
        }
        else{
            return redirect()->route('home');

        }



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
