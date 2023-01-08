<?php

namespace App\Http\Livewire\User\Settings;

use Livewire\Component;

class ProfileSecurity extends Component
{

    public function render()
    {
        return view('livewire.user.settings.profile-security')->extends('layouts.contentLayoutMaster');
    }

}
