<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    protected $fillable = [
        'userID',
        'email',
        'itemID',
        'name',
        'dateStart',
        'dateEnd',
        'comments',
    ];

    protected $hidden = [
        'remember_token',
    ];
}
