<?php

namespace App\Http\Livewire\Recipe;

use App\Domains\Auth\Models\User;
use App\Models\Recipe;
use App\Models\Tag;
use Livewire\Component;

class Recipes extends Component
{
    public $perPage = 6;
    public bool $viewingModal = false;
    public $name;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function viewModal(): void
    {
        $this->viewingModal = true;
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|string|unique:recipes,name,NULL,id,group_id,' . session('group_id')
        ]);
        \App\Models\Recipe::create(['name' => $this->name, 'user_id' => auth()->user()->id]);
        $this->reset('name', 'viewingModal');

    }

    public function addToFavourites(Recipe $recipe)
    {
        auth()->user()->favouriteRecipes()->attach($recipe);
    }

    public function deleteFromFavourites(Recipe $recipe)
    {
        auth()->user()->favouriteRecipes()->detach($recipe);
    }

    public function render()
    {
        return view('livewire.recipe.recipes')->extends('layouts.contentLayoutMaster')->with('recipes', \App\Models\Recipe::currentGroup()->with(['user', 'tags', 'currentUserFavourites'])->withCount('comments')->paginate($this->perPage));
    }
}
