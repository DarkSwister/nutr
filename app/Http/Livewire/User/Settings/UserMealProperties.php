<?php

namespace App\Http\Livewire\User\Settings;

use App\Domains\Auth\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserMealProperties extends Component
{
    public $state = [
        'weight' => null,
        'height' => null,
        'age' => null,
        'gender' => null,
        'eat_type' => null,
        'program' => null,
        'activity_level' => null,
    ];

    public function mount()
    {
        $user = auth()->user();
        $this->state = [
            'age' => $user->age ?? 18,
            'weight' => $user->weight ?? 70,
            'height' => $user->height ?? 170,
            'gender' => $user->gender ?? null,
            'eat_type' => $user->eat_type ?? null,
            'program' => $user->program ?? null,
            'activity_level' => $user->activity_level ?? null,
        ];
    }

    protected function rules()
    {
        return [
            'state.weight' => 'required|numeric|min:0|max:700',
            'state.height' => 'required|numeric|min:0|max:400',
            'state.age' => 'required|numeric|min:0|max:400',
            'state.gender' => ['required', Rule::in(User::$gender)],
            'state.eat_type' => ['required', Rule::in(User::$eatTypes)],
            'state.program' => ['required', Rule::in(User::$program)],
            'state.activity_level' => ['required', Rule::in(User::$activityLevel)],
        ];
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return auth()->user();
    }

    public function complete()
    {
        $validated = $this->validate();
        if (!auth()->user()->isSetup()) {
            $validated['state']['is_setup_complete'] = true;
            auth()->user()->update($validated['state']);
            return redirect()->route('frontend.user.profile-settings');
        } else {
            auth()->user()->update($validated['state']);
            $this->emit('$refresh');
        }

    }

    public function render()
    {
        return view('livewire.user.settings.user-meal-properties');
    }
}
