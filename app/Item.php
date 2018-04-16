<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Notifiable;
    protected $table ="item";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','subtitle','description','buy_now','status','payMethod', 'shipMethod','photos','category','subcategory'

    ];

}
