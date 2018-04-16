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
            $table->increments('itemID');
            $table->string('title');
            $table->string('subtitle');
            $table->string('description');
            $table->double('buy_now');
            $table->boolean('status');
            $table->string('pay_method');
            $table->string('ship_method');
            $table->string('photos');
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
        Schema::dropIfExists('item');
    }
}
