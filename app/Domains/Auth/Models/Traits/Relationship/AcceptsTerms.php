<?php

namespace App\Domains\Auth\Models\Traits\Relationship;

use App\Domains\Auth\Models\Term;

trait AcceptsTerms
{
    public function terms(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Term::class, 'user_terms')->withTimestamps();
    }

    public function hasAcceptedTerms(): bool
    {
        $term = Term::latest()->first();
        if ($term) return $this->terms->contains($term->id);
        return true;
    }
}
