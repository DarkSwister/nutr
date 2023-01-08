<?php

namespace Database\Factories;

use App\Domains\Auth\Models\User;
use App\Models\Group;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->colorName(),
            'description' => $this->faker->text(),
            'total_time' => $this->faker->word(),
            'prep_time' => $this->faker->word(),
            'perform_time' => $this->faker->word(),
            'cook_time' => $this->faker->word(),
            'recipe_yield' => $this->faker->word(),
            'recipeCuisine' => $this->faker->word(),
            'rating' => $this->faker->randomNumber(),
            'org_url' => $this->faker->url(),
            'is_ocr_recipe' => $this->faker->boolean(),
            'date_added' => Carbon::now(),
            'date_updated' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'group_id' => Group::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
