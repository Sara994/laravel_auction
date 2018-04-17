<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bid', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('user_id');
            $table->unsignedinteger('auction_id');
            $table->double('bid_amount');
            $table->double('max_bid');
            $table->timestamps();
            
            $table->foreign('auction_id')->references('id')->on('auction');
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
        Schema::dropIfExists('bid');
    }
}
