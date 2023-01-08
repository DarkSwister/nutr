<?php

namespace App\Http\Livewire\Group;

use App\Models\Group;
use Livewire\Component;

class GroupChoose extends Component
{
    public $groups;

    public $selectedGroup;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectTo()
    {
        return redirect()->route(homeRoute());
    }

    public function mount()
    {
        $this->groups = Group::get();
    }

    public function syncGroup()
    {
        auth()->user()->groups()->sync($this->selectedGroup);
    }

    public function render()
    {
        if (auth()->user()->groups()->exists()) $this->redirectTo();
        return view('livewire.group.group-choose')->extends('layouts.contentLayoutMaster');
    }
}
