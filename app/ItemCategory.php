<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = "item_category";
    protected $fillable = ['title','parent_id'];

    function parent(){
        return $this->hasOne('App\ItemCategory');
    }

    function children(){
        return $this->where('parent_id',$this->id)->get();
    }
}