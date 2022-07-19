<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'permission_id' => 1,
                'fullname' => 'Rhenald Ariendra Pasha Hidayat',
                'email' => 'rhenald@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'permission_id' => 2,
                'fullname' => 'Irvan Nur Hidayat',
                'email' => 'irvan@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'permission_id' => 3,
                'fullname' => 'Guest',
                'email' => 'guest@gmail.com',
                'password' => Hash::make('12345678')
            ],

        ]);
    }
}
