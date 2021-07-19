<?php

namespace App\Imports;

use App\Models\Standar;
use Maatwebsite\Excel\Concerns\ToModel;

class StandarImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Standar([
            'tahun' => $row[1],
            'nomor' => $row[2], 
            'nama'  => $row[3],
            'status' => $row[4] 
        ]);
    }
}
