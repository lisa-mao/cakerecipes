<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Recipe $recipe)
    {
        $request->validate([
            'content' => 'required|string|max:500'
        ]);

        if (!auth()->check()) {
            return redirect()->route('home');
        }

        $recipe->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request['content'],
        ]);

        return redirect()->route('recipes/show', $recipe);

    }

    public function show($id)
    {

        $recipe = Recipe::with(['comments.user'])
            ->findOrFail($id);

        if (!$recipe) {
            return redirect('/')->with('error', 'Recipe not found.');
        }

        return view('recipes.show', compact('recipe'));
    }

}
