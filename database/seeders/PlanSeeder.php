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
                'price' => '600',
                'return_price' => '300',
                'commission' => '32.12',
                'daily_earning' => '70.05',
                'withdraw' => '10000',
                'referral_commission' => '100'
            ],
            [
                'title'  => 'Plan 2',
                'price' => '700',
                'return_price' => '200',
                'commission' => '22.12',
                'daily_earning' => '70.05',
                'withdraw' => '20000',
                'referral_commission' => '1000'
            ],
            [
                'title'  => 'Plan 3',
                'price' => '700',
                'return_price' => '200',
                'commission' => '22.12',
                'daily_earning' => '70.05',
                'withdraw' => '20000',
                'referral_commission' => '1000'
            ],
            [
                'title'  => 'Plan 4',
                'price' => '800',
                'return_price' => '200',
                'commission' => '22.12',
                'daily_earning' => '70.05',
                'withdraw' => '20000',
                'referral_commission' => '1000'
            ],
            [
                'title'  => 'Plan 5',
                'price' => '900',
                'return_price' => '200',
                'commission' => '22.12',
                'daily_earning' => '70.05',
                'withdraw' => '20000',
                'referral_commission' => '1000'
            ],
        ]);
    }
}
