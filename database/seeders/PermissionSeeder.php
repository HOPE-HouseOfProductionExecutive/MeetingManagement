<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'name' => 'Master'
            ],
            [
                'id' => 2,
                'name' => 'Admin'
            ],
            [
                'id' => 3,
                'name' => 'Viewer'
            ],

        ]);
    }
}
