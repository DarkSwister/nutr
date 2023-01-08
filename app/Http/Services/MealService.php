<?php

namespace App\Http\Services;

use App\Domains\Auth\Models\User;
use App\Models\Recipe;
use App\Models\UserMealPlan;
use Carbon\Carbon;

class MealService
{

    protected User $model;
    protected Carbon $date;

    /**
     *
     * @param User $user
     */
    public function __construct(User $user, Carbon $date)
    {
        $this->model = $user;
        $this->date = $date;
    }

    private function getDayMap()
    {
        $now = $this->date;
        $day[$now->toDateString()] = [
            'breakfast' => false,
            'lunch' => false,
            'dinner' => false,
            'side' => false,
        ];
        return $day;
    }

    private function getWeekMap(bool $attributes = true): array
    {
        $now = $this->date;
        $week = [];
        for ($i = 0; $i < 7; $i++) {
            if ($attributes) {
                $week[$now->startOfWeek()->addDay($i)->toDateString()] = [
                    'breakfast' => false,
                    'lunch' => false,
                    'dinner' => false,
                    'side' => false,
                ];
            } else {
                $week[$now->startOfWeek()->addDay($i)->toDateString()] = [];
            }

        }
        return $week;
    }

    public function getUserMeals()
    {
        $plan = $this->getWeekMap(false);
        $weekStartDate = $this->date->startOfWeek()->toDateString();
        $weekEndDate = $this->date->endOfWeek()->toDateString();
        $meals = UserMealPlan::with('recipe')->where('user_id', $this->model->id)->whereBetween('date', [$weekStartDate, $weekEndDate])->orderBy('date')->orderBy('entry_type')->get()->groupBy(['date']);
        foreach ($meals as $day => $meal) {
            $plan[$day] = $meal;
        }
        return $plan;
    }

    public function getExistingMeals()
    {
        $weekStartDate = $this->date->startOfWeek()->toDateString();
        $weekEndDate = $this->date->endOfWeek()->toDateString();
        return UserMealPlan::where('user_id', $this->model->id)->whereBetween('date', [$weekStartDate, $weekEndDate])->orderBy('date')->get()->groupBy(['date', 'entry_type']);
    }

    public function getExistingMealsPerDay()
    {
        return UserMealPlan::where('user_id', $this->model->id)->whereDate('date', $this->date)->get()->groupBy(['date', 'entry_type']);
    }

    private function generateMealListPerWeek(): array
    {
        $weekMap = $this->getWeekMap();
        $existingMeals = $this->getExistingMeals();
        $toBeGenerated = [];
        foreach ($weekMap as $day => $entries) {
            foreach ($entries as $eatType => $presence) {
                if (!isset($existingMeals[$day][$eatType])) {

                    $toBeGenerated[$day][$eatType] = $this->findMeal($eatType);
                } else {
                    $weekMap[$day][$eatType] = true;
                }
            }
        }
        return $toBeGenerated;
    }

    private function generateMealListPerDay(): array
    {
        $dayMap = $this->getDayMap();
        $toBeGenerated = [];
        foreach ($dayMap as $day => $entries) {
            foreach ($entries as $eatType => $presence) {
                $toBeGenerated[$day][$eatType] = $this->findMeal($eatType);
            }
        }
        return $toBeGenerated;
    }

    public function generateWeakMeal(): bool
    {
        return $this->createMeals($this->generateMealListPerWeek());
    }

    private function createMeals(array $mealList)
    {
        foreach ($mealList as $day => $meals) {
            foreach ($meals as $type => $meal) {
                $this->model->mealPlans()->create(['entry_type' => $type, 'title' => '', 'text' => '', 'date' => $day, 'recipe_id' => $meal]);
            }
        }
        return true;
    }

    public function regenerateDayMeal(): bool
    {
        $this->model->mealPlans()->whereDate('date', $this->date)->delete();
        return $this->createMeals($this->generateMealListPerDay());
    }

    public function regenerateWeekMeal(): bool
    {
        $weekStartDate = $this->date->startOfWeek()->toDateString();
        $weekEndDate = $this->date->endOfWeek()->toDateString();
        $this->model->mealPlans()->whereBetween('date', [$weekStartDate, $weekEndDate])->delete();
        return $this->createMeals($this->generateMealListPerWeek());
    }

    public function findMeal(string $eatType)
    {
        return Recipe::when($eatType === 'breakfast', function ($q) {
            return $q->whereHas('tags', function ($query) {
                return $query->where('slug', 'breakfast');
            });
        })->when($eatType === 'lunch', function ($q) {
            return $q->whereHas('tags', function ($query) {
                return $query->where('slug', 'lunch');
            });
        })->when($eatType === 'dinner', function ($q) {
            return $q->whereHas('tags', function ($query) {
                return $query->where('slug', 'dinner-party');
            });
        })->when($eatType != 'dinner' || $eatType != 'lunch', function ($q) {
            return $q->whereHas('tags', function ($query) {
                return $query->where('slug', '!=', 'lunch')->where('slug', '!=', 'breakfast')->where('slug', '!=', 'dinner-party');
            });
        })->inRandomOrder()->first()->id;
    }

}

