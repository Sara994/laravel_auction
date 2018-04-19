<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_transaction',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedinteger('item_id');
            $table->unsignedinteger('user_id');
            $table->double('price',11,2);
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('item');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
