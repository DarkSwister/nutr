<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Http\Request;
use Livewire\Component;

class TwoFactorDisable extends Component
{
    public $code;

    public function destroy(Request $request)
    {
        $this->validate([
            'code' => 'required|min:6|totp',
        ]);
        $request->user()->disableTwoFactorAuth();

        session()->flash('flash_success', __('Two Factor Authentication Successfully Disabled'));

        return redirect()->route('frontend.user.profile-security');
    }

    public function render()
    {
        return view('livewire.frontend.two-factor-disable');
    }
}
