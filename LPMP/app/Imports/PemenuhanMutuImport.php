<?php

namespace App\Imports;
use App\Models\Standar;
use App\Models\Indikator;
use App\Models\SubIndikator;

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
    public function collection(Collection $rows)
    {   
        foreach ($rows as $row) 
        {
            if($row["No"]!=null){
                $standar = Standar::where('nomor',$row["Nomor Standar"])-> where('nama',$row["Nama Standar"])->first();
                $standarId = -1;
                
                if($standar){
                    $standarId = $standar["id"];
                }else{
                    Standar::create([
                        'tahun' => $row["Tahun"],
                        'nomor' => $row["Nomor Standar"], 
                        'nama'  => $row["Nama Standar"],
                        'status' => 0 
                    ]);
                    $standar = Standar::where('nomor',$row["Nomor Standar"])-> where('nama',$row["Nama Standar"])->first();
                    $standarId = $standar["id"];
                    
                }
                
    
                $indikator = Indikator::where('nomor',$row["Nomor Indikator"])-> where('nama',$row["Nama Indikator"])->first();
                $indikatorId = -1;
                if($indikator){
                    $indikatorId = $indikator["id"];
                }else{
                    Indikator::create([
                        'tahun' => $row["Tahun"],
                        'nomor' => $row["Nomor Indikator"], 
                        'nama'  => $row["Nama Indikator"],
                        'status' => 0,
                        'standar_id' => $standarId
                    ]);
                    $indikator = Indikator::where('nomor',$row["Nomor Indikator"])-> where('nama',$row["Nama Indikator"])->first();
                    $indikatorId = $indikator["id"];
                }


                $subIndikator = SubIndikator::where('nomor',$row["Nomor SubIndikator"])-> where('nama',$row["Nama SubIndikator"])->first();
                $subIndikatorId = -1;
                if($subIndikator){
                    $subIndikatorId = $subIndikator["id"];
                }else{
                    SubIndikator::create([
                        'tahun' => $row["Tahun"],
                        'nomor' => $row["Nomor SubIndikator"], 
                        'nama'  => $row["Nama SubIndikator"],
                        'status' => 0,
                        'indikator_id' => $indikatorId
                    ]);
                    $subIndikator = SubIndikator::where('nomor',$row["Nomor SubIndikator"])-> where('nama',$row["Nama SubIndikator"])->first();
                    $subIndikatorId = $subIndikator["id"];
                }
            }
            
            
        }
    }
}
