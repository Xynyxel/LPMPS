<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubIndikator;
use App\Models\Indikator;

class SubIndikatorController extends Controller
{
    public function all() {
        return SubIndikator::get();
    }

    public function dataByIndikatorId($id) {
        return SubIndikator::select('sub_indikator.*','rs.nilai as nilai')
            ->join('raport_sekolah as rs','rs.sub_indikator_id','sub_indikator.id')
            ->where('indikator_id',$id)
            ->get();
    }

    public function kekuatan($id) {
        $avg = SubIndikator::join('raport_sekolah as rs','rs.sub_indikator_id','sub_indikator.id')
            ->where('indikator_id',$id)->avg('rs.nilai');
        $avg = number_format((float)$avg, 2, '.', '');

        return SubIndikator::select('sub_indikator.*','rs.nilai as nilai')
            ->join('raport_sekolah as rs','rs.sub_indikator_id','sub_indikator.id')
            ->where('indikator_id',$id)
            ->where('nilai',">=",$avg)
            ->get();
    }

    public function kelemahan($id) {
        $avg = SubIndikator::join('raport_sekolah as rs','rs.sub_indikator_id','sub_indikator.id')
            ->where('indikator_id',$id)->avg('rs.nilai');
        $avg = number_format((float)$avg, 2, '.', '');
        
        return SubIndikator::select('sub_indikator.*','rs.nilai as nilai')
            ->join('raport_sekolah as rs','rs.sub_indikator_id','sub_indikator.id')
            ->where('indikator_id',$id)
            ->where('nilai',"<",$avg)
            ->get();
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
