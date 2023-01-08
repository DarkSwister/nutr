<?php

namespace App\Http\Livewire\User\Settings;

use Livewire\Component;

class Profile extends Component
{
    public $currentTab;

    public function mount(){
        $this->currentTab = 'nav-profile-settings-tab';
    }
    public function changeTab(string $tab)
    {
        $this->currentTab = $tab;
    }

    public function render()
    {
        return view('livewire.user.settings.profile')->extends('layouts.contentLayoutMaster')->section('content');
    }
}
