<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction', function (Blueprint $table) {
            $table->increments('auctionID');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->string('winner');
            $table->double('min_increment',11,2);
            $table->double('buy_now',11,2);
            $table->timestamps();
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
        Schema::dropIfExists('auction');
    }
}
