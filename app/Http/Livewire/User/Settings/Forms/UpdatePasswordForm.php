<?php

namespace App\Http\Livewire\User\Settings\Forms;

use App\Domains\Auth\Rules\UnusedPassword;
use App\Domains\Auth\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Livewire\Component;

class UpdatePasswordForm extends Component
{
    use LivewireAlert;
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'current_password' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    /**
     * Update the user's password.
     *
     */
    public function updatePassword(UpdatesUserPasswords $updater)
    {

        $this->resetErrorBag();

        $updater->update(Auth::user(), $this->state);

        $this->state = [
            'current_password' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

        $this->dispatchBrowserEvent('saved');

        $this->alert('info', __('Password Updated Successfully'),[
            'toast'=>false
        ]);
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.update-password-form');
    }
}
