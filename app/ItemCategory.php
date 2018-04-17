<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = "item_category";
    protected $fillable = ['title','parent_id'];

    function parent(){
        $this->hasOne('App\ItemCategory','parent_id','id');
    }
}