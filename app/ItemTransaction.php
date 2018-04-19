<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    protected $table = "item+transaction";

    protected $fillable = ['user_id','item_id','price'];
}
