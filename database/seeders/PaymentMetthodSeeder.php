<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMetthodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            ['name' => ' USDT (trc20)'],
            ['name' => ' Bank Transfer'],
            ['name' => ' Gpay'],
            ['name' => ' Paytm'],
            ['name' => ' Paypal'],
            ['name' => '  Jazz cash'],
            ['name' => ' Easy pasa'],
            ['name' => ' Perfect money'],
            ['name' => ' Payeer'],
            ['name' => ' Advcash'],
            ['name' => ' Payoneer'],
            ['name' => ' Skrill'],
            ['name' => ' Webmoney'],
            ['name' => ' Neteller'],
            ['name' => ' Epay']
        ]);
    }
}
