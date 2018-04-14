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
            $table->datetime('startTime');
            $table->datetime('endTime');
            $table->string('winner');
            $table->double('minIncrement',11,2);
            $table->double('buyNow',11,2);
            $table->string('category');
            $table->string('subCategory');
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
