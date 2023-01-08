<?php

namespace App\Domains\Auth\Models\Traits\Relationship;

use App\Domains\Auth\Models\Account;
use App\Domains\Auth\Models\PasswordHistory;
use App\Models\Group;
use App\Models\Recipe;
use App\Models\UserMealPlan;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{

    public function account(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories(): mixed
    {
        return $this->morphMany(PasswordHistory::class, 'model');
    }

    public function groups(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    public function favouriteRecipes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'users_to_favorites');
    }

    public function mealPlans(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserMealPlan::class);
    }
}
