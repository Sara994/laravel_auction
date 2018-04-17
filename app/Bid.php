<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model{
    protected $table ="bid";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bid_amount','max_bid','user_id','auction_id'
    ];

    function user(){
        return $this->hasOne('App\User','user_id','id');
    }
    function auction(){
        return $this->hasOne('App\Auction','auction_id','id');
    }
}