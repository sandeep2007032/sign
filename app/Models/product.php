<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected
    $fillable = [
        'user_id',
                'name',
        'age',
        'gender',
        'phone',
        ];

}
