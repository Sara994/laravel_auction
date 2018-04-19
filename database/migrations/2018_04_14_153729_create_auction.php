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
            $table->increments('id');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->unsignedinteger('winner_id')->nullable();
            $table->double('min_increment',11,2);
            $table->double('buy_now',11,2);
            $table->double('start_price',11,2);
            $table->timestamps();

            $table->foreign('winner_id')->references('id')->on('users');
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
