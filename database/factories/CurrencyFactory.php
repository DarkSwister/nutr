<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'symbol_left' => $this->faker->word(),
            'symbol_right' => $this->faker->word(),
            'code' => $this->faker->word(),
            'decimal_place' => $this->faker->randomNumber(),
            'value' => $this->faker->randomFloat(),
            'decimal_point' => $this->faker->word(),
            'thousand_point' => $this->faker->word(),
            'status' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
