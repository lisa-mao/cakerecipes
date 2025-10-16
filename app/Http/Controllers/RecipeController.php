<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function show($id){
        $recipe = new Recipe();
    $recipe = Recipe::findOrFail(1);

    if (!$recipe){
        redirect('/');
    }

        $recipe->name ='Chiffon Cake';
        $recipe->time = 60;

        return view('recipes.show',compact('recipe'));




    }



    public function store(Request $request)

    {
        //validatie
        $request->validate([
            'name' => 'required|max:100',
            'ingredient' => 'required'
        ]);
        //error tonen

        $recipe = new Recipe();
        $recipe->name = "choco cake";
        $recipe->time = 60;
        $recipe->ingredient = "choco and cake";
        $recipe->category = 2;

        $recipe->save();

        return redirect()->route('recipes.index');

        //beveiliging
        //data terug schrijven in de form fields
        //
    }

    public  function create()
    {
        $categories = Category::all();
        return view('recipes.create', $categories);
    }

}
