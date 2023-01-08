<?php

namespace App\Http\Livewire\User\Settings;

use App\Domains\Auth\Models\User;
use Livewire\Component;

class ProfileNotifications extends Component
{
    public User $user;

    protected $rules = [
        'user.twitter' => 'nullable|string|max:100',
        'user.facebook' => 'nullable|string|max:100',
        'user.instagram' => 'nullable|string|max:100',
        'user.telegram' => 'nullable|string|max:100',
    ];
    public function render()
    {
        return view('livewire.user.settings.profile-notifications')->extends('layouts.contentLayoutMaster');
    }
}
