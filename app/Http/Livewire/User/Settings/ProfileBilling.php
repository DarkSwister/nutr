<?php

namespace App\Http\Livewire\User\Settings;

use Livewire\Component;

class ProfileBilling extends Component
{
    public function render()
    {
        return view('livewire.user.settings.profile-billing')->extends('layouts.contentLayoutMaster');
    }
}
