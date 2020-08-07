<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'name',
        'picture',
        'packageitems',
        'instructions',
        'description',
        'additionalinfo',
        'itemsleft'
    ];

    protected $hidden = [
       'remember_token', 'status',
    ];
}

