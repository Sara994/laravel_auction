<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table ="item";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','subtitle','description','buy_now','status','pay_method', 'ship_method','photos','category_id','owner_id','auction_id','city_id'
    ];

    function category(){
        return $this->hasOne('App\ItemCategory','cateogry_id','id');
    }

    function owner(){
        return $this->hasOne('App\User','id');
    }
    function auction(){
        return $this->hasOne('App\Auction','id');
    }
    function city(){
        return $this->hasOne('App\city','id');
    }
}
