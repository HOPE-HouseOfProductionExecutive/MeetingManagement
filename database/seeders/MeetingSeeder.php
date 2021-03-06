<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->insert([
            [
                'title_id' => 1,
                'tindak_lanjut' => 'Meeting 1',
                'progress' => 'Meeting 1',
                'data_pendukung' => 'Meeting 1',
                'SKPD' => 'SKPD 1',
                'keterangan' => 'Selesai',
                'waktu_selesai' => '2020-07-13',
            ],
            [
                'title_id' => 2,
                'tindak_lanjut' => 'Meeting 2',
                'progress' => 'Meeting 2',
                'SKPD' => 'SKPD 2',
                'keterangan' => 'Selesai',
                'data_pendukung' => 'Meeting 2',
                'waktu_selesai' => '2020-07-13',
            ],
            [
                'title_id' => 3,
                'tindak_lanjut' => 'Meeting 3',
                'progress' => 'Meeting 3',
                'SKPD' => 'SKPD 3',
                'keterangan' => 'Selesai',
                'data_pendukung' => 'Meeting 3',
                'waktu_selesai' => '2020-07-22',
            ],
            [
                'title_id' => 4,
                'tindak_lanjut' => 'Meeting 4',
                'progress' => 'Meeting 4',
                'SKPD' => 'SKPD 4',
                'keterangan' => 'Selesai',
                'data_pendukung' => 'Meeting 4',
                'waktu_selesai' => '2020-12-25',
            ],
        ]);
    }
}
