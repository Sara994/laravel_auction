<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use Notifiable;
    protected $table ="review";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
   protected $fillable = [
       'star_num','feedback'

   ];

}
