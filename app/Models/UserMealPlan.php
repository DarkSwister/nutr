<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMealPlan extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'entry_type', 'title', 'text', 'user_id', 'recipe_id'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function recipe(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function nutrition()
    {
        return $this->hasOneThrough(RecipeNutrition::class, Recipe::class, 'id', 'recipe_id', 'recipe_id');
    }
}
