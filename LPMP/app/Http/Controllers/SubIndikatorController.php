<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubIndikator;
use App\Models\Indikator;
use App\Models\RaportSekolah;

class SubIndikatorController extends Controller
{
    public function all() {
        return SubIndikator::get();
    }

    public function dataByIndikatorId($id,$sekolah_id) {
        return SubIndikator::select('sub_indikator.*','rs.nilai as nilai')
            ->join('raport_sekolah as rs','rs.sub_indikator_id','sub_indikator.id')
            ->where('indikator_id',$id)
            ->where('rs.sekolah_id',$sekolah_id)
            ->get();
    }

    public function kekuatan($id, $sekolah_id) {
        $raport = RaportSekolah::select('si.*','raport_sekolah.nilai','rk.nilai_kpi')
            ->join('sub_indikator as si','si.id','raport_sekolah.sub_indikator_id')
            ->join('raport_kpi as rk','rk.sub_indikator_id','si.id')
            ->join('kota_kabupaten as kk','kk.id','rk.kota_kabupaten_id')
            ->join('sekolah as s','s.kota_kabupaten_id','kk.id')
            ->where('s.id',$sekolah_id)
            ->where('si.indikator_id',$id)
            ->get();

        $data = [];
        for($i = 0; $i < $raport->count(); $i++) {
            if($raport[$i]->nilai >= $raport[$i]->nilai_kpi) {
                array_push($data,$raport[$i]);
            }
        }

        return $data;
    }

    public function kelemahan($id, $sekolah_id) {
        $raport = RaportSekolah::select('si.*','raport_sekolah.nilai','rk.nilai_kpi')
            ->join('sub_indikator as si','si.id','raport_sekolah.sub_indikator_id')
            ->join('raport_kpi as rk','rk.sub_indikator_id','si.id')
            ->join('kota_kabupaten as kk','kk.id','rk.kota_kabupaten_id')
            ->join('sekolah as s','s.kota_kabupaten_id','kk.id')
            ->where('s.id',$sekolah_id)
            ->where('si.indikator_id',$id)
            ->get();

        $data = [];
        for($i = 0; $i < $raport->count(); $i++) {
            if($raport[$i]->nilai >= $raport[$i]->nilai_kpi) {
                array_push($data,$raport[$i]);
            }
        }

        return $data;
    }

    public function tambah(Request $request) {
        SubIndikator::create([
            "id" => null,
            "tahun" => $request->tahun,
            "nomor" => $request->nomor,
            "nama" => $request->nama,
            "status" => $request->status,
            "indikator_id" => $request->indikator_id,
        ]);
        return redirect("/dataMaster");
    }

    public function edit($id) {
        return SubIndikator::find($id);
    }
    
    public function ubah(Request $request, $id) {
        $subIndikator = SubIndikator::find($id);
        $subIndikator->tahun = $request->tahun;
        $subIndikator->nomor = $request->nomor;
        $subIndikator->nama = $request->nama;
        $subIndikator->status = $request->status;
        $subIndikator->indikator_id = $request->indikator_id;
        $subIndikator->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        SubIndikator::find($id)->delete();
        return redirect("/dataMaster");
    }
}
