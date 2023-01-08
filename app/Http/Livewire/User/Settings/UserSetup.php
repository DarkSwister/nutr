<?php

namespace App\Http\Livewire\User\Settings;

use Livewire\Component;

class UserSetup extends Component
{

    public function render()
    {
        return view('livewire.user.settings.user-setup')->extends('layouts.contentLayoutMaster');
    }
}
