<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemSpec extends Model
{
    protected $table = "item_spec";
    protected $fillable = ['item_id','spec_key','spec_value'];
}
