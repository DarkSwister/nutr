<?php

namespace App\Traits;

use App\Domains\Auth\Models\User;
use App\Models\Group;

trait DefaultRelationTrait
{
    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCurrentGroup($query)
    {
        return $query;
//        return $query->where('group_id', session('group_id'))->whereNotNull('group_id');
    }
}
