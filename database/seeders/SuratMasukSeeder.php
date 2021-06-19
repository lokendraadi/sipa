<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surat_masuks')->insert([
            'no_surat' => '800/73/35.07/201/2021',
            'no_agenda' => '4743',
            'tanggal_pkpa' => '101010',
            'tanggal_surat' => '101010',
            'perihal' => 'Ijin Cuti',
            'dari' => 'Dinas Komunikasi dan Informatika',
            'kepada' => 'ka BKPSDM',
            'disposisi' => 'subid fkin',
            'posisi_terakhir' => 'Lokendra',
        ]);
    }
}
