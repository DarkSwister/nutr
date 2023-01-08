<?php

namespace App\Traits;

use App\Domains\Auth\Models\User;

trait UserMetabolismTrait
{
    //body mass index
    public function getBmi(float $weight, float $height)
    {
        $height = $height / 100;
        return round($weight / ($height * $height), 2);
    }

    //basal metabolism
    public function getBmr(User $user)
    {
        if($user->isMale());
    }
}
