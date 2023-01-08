<?php

namespace App\Http\Livewire\User\Settings;

use App\Domains\Auth\Models\User;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProfileConnections extends Component
{
    use LivewireAlert;
    
    public User $user;

    protected $rules = [
        'user.twitter' => 'nullable|string|max:100',
        'user.facebook' => 'nullable|string|max:100',
        'user.instagram' => 'nullable|string|max:100',
        'user.telegram' => 'nullable|string|max:100',
    ];

    public function saveSocials()
    {
        $this->validate();

        $this->user->save();

        $this->alert('success', __('User Socials Updated successfully'), [
            'toast' => false
        ]);
    }

    public function mount(Request $request)
    {
        $this->user = $request->user();
    }

    public function render()
    {
        return view('livewire.user.settings.profile-connections')->extends('layouts.contentLayoutMaster')->withUser(auth()->user());
    }
}
