<?php

namespace App\Imports;

use App\Models\SubIndikator;
use Maatwebsite\Excel\Concerns\ToModel;

class SubIndikatorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SubIndikator([
            'tahun' => $row[1],
            'nomor' => $row[2], 
            'nama'  => $row[3],
            'status' => $row[4],
            'indikator_id' => $row[5]
        ]);
    }
}
