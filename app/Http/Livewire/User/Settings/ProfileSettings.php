<?php

namespace App\Http\Livewire\User\Settings;

use App\Models\Group;
use Livewire\Component;

class ProfileSettings extends Component
{
    public $data;
    public $groups;
    public $selectedGroup;
    public $selectedGroupId;

    public function mount()
    {
        $this->groups = auth()->user()->groups()->get();
        $this->selectedGroupId = $this->groups->first()->id ?? null;
        $this->selectedGroup = $this->getGroupInfo($this->selectedGroupId);
    }

    public function updatingSelectedGroupId($val)
    {
        $this->selectedGroup = $this->getGroupInfo($val);
    }

    private function getGroupInfo($id)
    {
        return Group::withCount('recipes','users','categories','tags')->find($id);
    }

    public function render()
    {
        return view('livewire.user.settings.profile-settings')->extends('layouts.contentLayoutMaster');
    }
}
