<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','username','phone','postcode','email', 'password','city_id','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function city(){
        return $this->hasOne('App\City','id');
    }

    function items(){
        return $this->hasMany('App\Item','seller_id');
    }

    function rating(){
        $items = $this->items;
        $allratings = [];
        foreach($items as $item){
            $reviews = $item->reviews;
            foreach($reviews as $review){
                $allratings[] = $review->star_num;
            }
        }
        if(count($allratings) == 0)
            return 0;
        return round(array_sum($allratings)/count($allratings));
    }
}
