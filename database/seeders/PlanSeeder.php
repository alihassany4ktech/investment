<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            [
                'title'  => 'Plan 1',
                'price' => '70',
                'return_price' => '108',
                'commission' => '55',
                'daily_earning' => '1.8',
                'withdraw' => '10',
                'referral_commission' => '16'
            ],
            [
                'title'  => 'Plan 2',
                'price' => '140',
                'return_price' => '231',
                'commission' => '60',
                'daily_earning' => '3.85',
                'withdraw' => '8',
                'referral_commission' => '18'
            ],
            [
                'title'  => 'Plan 3',
                'price' => '210',
                'return_price' => '367',
                'commission' => '75',
                'daily_earning' => '6.11',
                'withdraw' => '6',
                'referral_commission' => '20'
            ],
            [
                'title'  => 'Plan 4',
                'price' => '500',
                'return_price' => '0',
                'commission' => '85',
                'daily_earning' => '0',
                'withdraw' => '4',
                'referral_commission' => '22'
            ]
        ]);
    }
}
