<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function switch(Group $group)
    {
        session(['group_id' => $group->id]);
        return redirect()->back();
    }
}
