<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Audience extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'birthday', 'birth_place', 'age', 'sex'];

    public function show(){
        return $this->belongsToMany('App\Show', 'show_audiences')->withPivot('rating');
    }

    public function user_data(){
        return $this->hasOne('App\User');
    }

    public static function current_user(){
        $id = Auth::id();
        return Audience::whereHas('user_data', function($q) use ($id){
                $q->where('id', $id);
        })->first();
        // return Audience::with('user_data')->whereId($id)->first();
        
    }
}
