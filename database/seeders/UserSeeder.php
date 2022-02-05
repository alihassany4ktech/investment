<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name'  => 'Marknar',
                'last_name'  => 'Doe',
                'address'  => '71 Pilgrim Avenue Chevy Chase, MD 20815',
                'city'  => 'Lahore',
                'region'  => 'Punjab',
                'postal_or_zip_code'  => '12345',

                'phone'  => '1112223334',
                'is_plus_eighteen'  => 1,
                'national_id'  => '1234512345123',
                'email' => 'doe@gmail.com',
                'password' => Hash::make('password'),     //password
                'remember_token' => Str::random(10),
            ],
            [
                'first_name'  => 'Hamza',
                'last_name'  => 'Ali',
                'address'  => '71 Pilgrim Avenue Chevy Chase, MD 20815',
                'city'  => 'Lahore',
                'region'  => 'Punjab',
                'postal_or_zip_code'  => '12345',
                'phone'  => '1112223330',
                'is_plus_eighteen'  => 1,
                'national_id'  => '1234512345120',
                'email' => 'hamza@gmail.com',
                'password' => Hash::make('password'),     //password
                'remember_token' => Str::random(10),
            ]
        ]);
    }
}
