<?php

namespace App\Http\Livewire\Recipe;

use App\Http\Livewire\Component;
use App\Http\Services\RecipeService;
use App\Models\Recipe;

class RecipeModel extends Component
{
    public Recipe $recipe;

    public $readOnly = true;

    public function edit()
    {
        $this->readOnly = !$this->readOnly;
    }

    public function mount(Recipe $recipe)
    {
        $recipe->load('nutrition');
        $this->recipe = $recipe;
        $this->breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('recipes.index'), 'name' => __('All Recipes')], ['name' => "Recipe"]
        ];
    }

    public function render()
    {
        return view('livewire.recipe.recipe')->extends('layouts.contentLayoutMaster',['breadcrumbs' => $this->breadcrumbs]);
    }
}
