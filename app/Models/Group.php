<?php

namespace App\Models;

use App\Domains\Auth\Models\Traits\Relationship\GroupRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    use GroupRelationship;

}
