<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowAudience extends Model
{
    //
    protected $fillable = [
        'show_id',
        'audience_id',
        'rating'
    ];
}
