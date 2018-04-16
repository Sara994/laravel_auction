<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model{
    use Notifiable;
    protected $table ="bid";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bid_amount','max_bid'

    ];
}