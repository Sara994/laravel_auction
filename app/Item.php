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
        'title','subtitle','description','buy_now','status','pay_method', 'ship_method','photos','category_id','seller_id','auction_id','city_id','sold'
    ];

    public function category(){
        return $this->hasOne('App\ItemCategory','id','category_id')->get();
    }

    function seller(){
        return $this->hasOne('App\User','id','seller_id');
    }
    function auction(){
        return $this->hasOne('App\Auction','id','auction_id');
    }
    function city(){
        return $this->hasOne('App\city','id');
    }
    function photos(){
        return json_decode($this->photos);
    }
    function specs(){
        return $this->hasMany('App\ItemSpec','item_id');
    }
}
