<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use App\Traits\DefaultRelationTrait;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class BaseModel extends Model
{
    use DefaultRelationTrait;


    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($item) {

            if (session('group_id')) {
                if ($item->getConnection()
                    ->getSchemaBuilder()
                    ->hasColumn($item->getTable(), 'group_id')) {
                    $item->group_id = session('group_id');

                }
            }
        });

    }
}
