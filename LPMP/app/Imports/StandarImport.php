<?php

namespace App\Imports;

use App\Models\Standar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StandarImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Standar([
            'tahun' => $row["tahun"],
            'nomor' => $row["nomor_standar"], 
            'nama'  => $row["nama_standar"],
            'status' => 0 
        ]);
    }
}
