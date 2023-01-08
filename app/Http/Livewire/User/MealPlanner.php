<?php

namespace App\Http\Livewire\User;

use App\Http\Services\MealService;
use App\Models\Recipe;
use App\Models\UserMealPlan;
use Carbon\Carbon;
use App\Domains\Auth\Models\User;
use Livewire\Component;

class MealPlanner extends Component
{

    public $date;

    public function mount()
    {
        $this->date = Carbon::now();
    }

    public function generate()
    {
        (new MealService($this->user, Carbon::now()))->generateWeakMeal();
    }

    public function delete(UserMealPlan $mealPlan)
    {
        $mealPlan->delete();
    }

    public function getUserProperty()
    {
        return auth()->user();
    }

    public function regenerateForDay(string $day)
    {
        (new MealService($this->user, Carbon::parse($day)))->regenerateDayMeal();
    }

    public function regenerateOneMeal()
    {

    }

    public function regenerateForWeek(string $day)
    {
        (new MealService($this->user, Carbon::parse($day)))->regenerateWeekMeal();
    }

    public function render()
    {
        $meals = (new MealService($this->user, Carbon::now()))->getUserMeals();
        return view('livewire.user.meal-planner', compact('meals'))->extends('layouts.contentLayoutMaster');
    }
}
