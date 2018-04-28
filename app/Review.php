<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model{
    protected $table ="review";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'star_num','feedback','item_id','user_id'
    ];

    function item(){
        return $this->hasOne('App\Item','item_id');
    }

    function user(){
        return $this->hasOne('App\User','poster_id');
    }
}