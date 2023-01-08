<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function randomRecipe()
    {
        $recipe = Recipe::inRandomOrder()->firstOrFail();
        return redirect()->route('recipe.show', $recipe);
    }
}
