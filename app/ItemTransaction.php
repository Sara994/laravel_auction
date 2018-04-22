<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    protected $table = "item_transaction";

    protected $fillable = ['user_id','item_id','price','name','phone'];

    function user(){
        return $this->hasOne('App\User','id');
    }
}
