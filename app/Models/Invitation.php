<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'group_id', 'email', 'invitation_token', 'registered_at',
    ];

    public function sender(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function generateInvitationToken()
    {
        $this->invitation_token = substr(md5(rand(0, 9) . $this->email . time()), 0, 32);
    }

    public function getLink(): string
    {
        return urldecode(route('frontend.auth.register') . '?invitation_token=' . $this->invitation_token);
    }
}
