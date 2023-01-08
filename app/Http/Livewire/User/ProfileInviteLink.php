<?php

namespace App\Http\Livewire\User;

use App\Domains\Auth\Models\User;
use App\Models\Invitation;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProfileInviteLink extends Component
{
    use LivewireAlert;

    public $selectedGroupId;
    public $groups;
    public $email;
    public $link;
    public $validEmail = false;
    public $rules = [
        'selectedGroupId' => 'required|exists:groups,id',
    ];

    public function updatedSelectedGroupId()
    {
        $this->resetErrorBag();
    }

    public function updatingEmail($value)
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->validEmail = true;
        }
    }

    public function generateLink()
    {
        $this->validate([
            'selectedGroupId' => 'required|exists:groups,id',
        ]);
        $invitation = Invitation::whereNull('registered_at')->firstOrCreate(['group_id' => $this->selectedGroupId, 'user_id' => auth()->user()->id]);
        $invitation->generateInvitationToken();
        $invitation->save();
        $this->link = $invitation->getLink();

    }

    public function sendEmail()
    {
        $this->validate([
            'selectedGroupId' => 'required|exists:groups,id',

        ]);
        $this->validate([
            'email' => ['required', 'email', 'unique:invitations,email,NULL,id,group_id,' . $this->selectedGroupId]
        ]);
        $existingUser = User::where('email', $this->email)->first();
        if ($existingUser) {
            $existingUser->sendInvitation($this->selectedGroupId);
            $this->alert('info', __('Notification created'), [
                'toast' => false
            ]);
        } else {
            $existingInvitation = Invitation::whereNotNull('registered_at')->where('email', $this->email)->exists();
            if (!$existingInvitation) {
                $invitation = Invitation::whereNull('registered_at')->firstOrCreate(['group_id' => $this->selectedGroupId, 'user_id' => auth()->user()->id, 'email' => $this->email]);
                $invitation->generateInvitationToken();
                $invitation->save();
                $this->link = $invitation->getLink();
            } else {
                $this->reset('link');
            }
        }


    }

    public function render()
    {
        return view('livewire.user.profile-invite-link');
    }
}
