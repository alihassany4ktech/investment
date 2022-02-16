<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountdownColumnInPurchasedPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchased_plans', function (Blueprint $table) {
            $table->string('countdown')->nullable()->after('term_and_condition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchased_plans', function (Blueprint $table) {
            $table->dropColumn('countdown');
        });
    }
}
