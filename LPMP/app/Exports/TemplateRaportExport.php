<?php

namespace App\Exports;

use App\models\Standar;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;

class TemplateRaportExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $value = Standar::select('standar.tahun as Tahun', 'standar.nomor as Nomor_Standar', 'standar.nama as Nama_standar','in.nomor as Nomor_Indikator','in.nama as Nama_Indikator','sb.nomor as Nomor_SubIndikator','sb.nama as Nama_SubIndikator')
            ->join('indikator as in', 'in.standar_id','standar.id')
            ->join('sub_indikator as sb', 'sb.indikator_id','in.id')
            ->get();
        return $value;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getProtection()->setPassword('password');
        $sheet->getProtection()->setSheet(true);
        $sheet->getStyle('H2:H39')->getProtection()
            ->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
    }


    public function headings(): array
    {
        return [
            'Tahun',
            'Nomor Standar',
            'Nama Standar',
            'Nomor Indikator',
            'Nama Indikator',
            'Nomor Sub Indikator',
            'Nama Sub Indikator',
            'Nilai'
        ];
    }
}
