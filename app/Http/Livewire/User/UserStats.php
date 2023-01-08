<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserStats extends Component
{
    protected $listeners = ['$refresh'];

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return auth()->user();
    }

    public function render()
    {
        return view('livewire.user.user-stats');
    }
}
