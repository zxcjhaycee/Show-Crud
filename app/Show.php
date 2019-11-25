<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
class Show extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable = [
        'show_name',
        'genre',
        'imdb_rating',
        'lead_actor',
        'encoder'
    ];

    // protected $attributes = [
    //     'encoder' => 
    // ];

    public function audience(){
        return $this->belongsToMany('App\Audience', 'show_audiences')->withPivot('rating');
    }

    public function encodedUser(){
        return $this->belongsTo('App\User', 'encoder');
    }
}
