<?php

namespace App\Imports;

use App\Models\Indikator;
use Maatwebsite\Excel\Concerns\ToModel;

class IndikatorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Indikator([
            'tahun' => $row[1],
            'nomor' => $row[2], 
            'nama'  => $row[3],
            'status' => $row[4],
            'standar_id' => $row[5]
        ]);
    }
}
