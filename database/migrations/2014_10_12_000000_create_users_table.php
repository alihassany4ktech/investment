<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('status')->default(1);
            $table->string('email')->unique();
            $table->string('image')->default('assets/images/userPic.png');
            $table->mediumText('document_address');
            $table->mediumText('address');
            $table->string('city');
            $table->string('region');
            $table->integer('postal_or_zip_code');
            $table->string('country');
            $table->string('country_code');
            $table->string('phone');
            $table->string('is_plus_eighteen');
            $table->string('national_id');
            $table->integer('email_verification_code')->nullable();
            $table->integer('phone_verification_code')->nullable();
            $table->boolean('varify_email')->default(0);
            $table->boolean('varify_phone')->default(0);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
