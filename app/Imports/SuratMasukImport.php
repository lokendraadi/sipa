<?php

namespace App\Imports;

use App\Models\SuratMasuk;
use Maatwebsite\Excel\Concerns\ToModel;

class SuratMasukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SuratMasuk([
            'no_surat' => $row[1],
            'no_agenda' => $row[2],
            'tanggal_pkpa' => $row[3],
            'tanggal_surat' => $row[4],
            'perihal' => $row[5],
            'dari' => $row[6],
            'kepada' => $row[7],
            'disposisi' => $row[8],
            'posisi_terakhir' => $row[9]
        ]);
    }
}
