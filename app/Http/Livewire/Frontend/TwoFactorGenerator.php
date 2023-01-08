<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class TwoFactorGenerator extends Component
{
    public function render()
    {
        if (!auth()->user()->hasTwoFactorEnabled()) {
            $secret = auth()->user()->createTwoFactorAuth();
            return view('livewire.frontend.two-factor-generator')->withQrCode($secret->toQr())
                ->withUri($secret->toUri())
                ->withSecret($secret->toString());
        }

    }
}
