<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasedPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('plan_id')->unsigned();
            $table->bigInteger('price')->nullable();
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->string('status')->default('Pending');
            $table->string('wallet_address')->nullable();
            $table->string('transaction_url')->nullable();
            $table->string('referral_code')->nullable();
            $table->boolean('referral_payment_status')->default(0);
            $table->string('screenshot')->nullable();
            $table->boolean('term_and_condition')->nullable();
            $table->integer('limit')->default(1);
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
        Schema::dropIfExists('purchased_plans');
    }
}
