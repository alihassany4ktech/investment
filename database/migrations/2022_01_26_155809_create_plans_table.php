<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('return_price')->nullable();
            $table->double('commission', 4, 2)->nullable();
            $table->string('daily_earning')->nullable();
            $table->bigInteger('withdraw')->nullable();
            $table->double('referral_commission', 4, 2)->nullable();
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
        Schema::dropIfExists('plans');
    }
}
