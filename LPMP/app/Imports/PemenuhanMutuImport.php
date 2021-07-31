<?php

namespace App\Imports;

use App\Models\Standar;
use App\Models\Indikator;
use App\Models\SubIndikator;
use App\Models\RaportSekolah;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class PemenuhanMutuImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */

    private $sekolahId = -1;

    public function __construct(int $sekolahId)
    {
        $this->sekolahId = $sekolahId;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // $standar = Standar::where('nomor', $row["Nomor Standar"])->where('nama', $row["Nama Standar"])->first();
            // $standarId = $standar["id"];

            // $indikator = Indikator::where('nomor', $row["Nomor Indikator"])->where('nama', $row["Nama Indikator"])->first();
            // $indikatorId = $indikator["id"];

            $subIndikator = SubIndikator::where('nomor', $row["Nomor Sub Indikator"])->where('nama', $row["Nama Sub Indikator"])->first();
            $subIndikatorId = $subIndikator["id"];

            RaportSekolah::create([
                'tahun' => $row["Tahun"],
                'nilai' => $row["Nilai"],
                'sekolah_id' => $this->sekolahId,
                'sub_indikator_id' => $subIndikatorId
            ]);
        }
    }
}
