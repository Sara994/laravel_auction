<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle');
            $table->string('description');
            $table->double('buy_now');
            $table->boolean('status');
            $table->boolean('sold')->default(false);
            $table->string('pay_method');
            $table->string('ship_method');
            $table->longtext('photos')->nullable();
            $table->unsignedinteger('category_id');
            $table->unsignedinteger('seller_id');
            $table->unsignedinteger('auction_id')->nullable();
            $table->unsignedinteger('city_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('item_category');
            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('auction_id')->references('id')->on('auction');
            $table->foreign('city_id')->references('id')->on('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
