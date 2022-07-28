<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->insert([
            [
                'judul' => 'Rapat 1',
                'waktu_rapat' => '2020-01-01',
            ],
            [
                'judul' => 'Rapat 2',
                'waktu_rapat' => '2020-02-02',
            ],
            [
                'judul' => 'Rapat 3',
                'waktu_rapat' => '2020-03-03',
            ],
            [
                'judul' => 'Rapat 4',
                'waktu_rapat' => '2020-04-04',
            ],
            [
                'judul' => 'Rapat 5',
                'waktu_rapat' => '2020-05-05',
            ],
        ]);
    }
}
