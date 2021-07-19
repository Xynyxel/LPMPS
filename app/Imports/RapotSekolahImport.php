<?php

namespace App\Imports;

use App\Models\RapotSekolah;
use Maatwebsite\Excel\Concerns\ToModel;

class RapotSekolahImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RapotSekolah([
            'tahun' => $row[1],
            'nilai' => $row[2], 
            'sekolah_id' => $row[3],
            'sub_indikator_id' => $row[4] 
        ]);
    }
}
