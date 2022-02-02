<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'company_name'  => '2easy.cash',
                'company_email' => '2easycash@gmail.com',
                'company_phone' => '+91 654 784 547',
                'company_address' => '71 Pilgrim Avenue Chevy Chase, MD 20815',
                'company_website_link' => 'https://www.test.com',
            ]
        ]);
    }
}
