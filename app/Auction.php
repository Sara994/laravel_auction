<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bid;

class Auction extends Model
{
    protected $table ="auction";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_time','end_time','winner_id','min_increment','buy_now','start_price'
    ];

    function minimum_bid(){
        $heighest = Bid::where('auction_id',$this->id)->max('price');
        if(is_null($heighest))
            return $this->start_price;
        return $heighest + $this->min_increment;
    }

    function heighest_bid(){
        $heighest = Bid::where('auction_id',$this->id)->max('price');
        if(is_null($heighest))
            return $this->start_price;
        return $heighest;
    }
}