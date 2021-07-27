<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indikator;
use Illuminate\Support\Facades\DB;

class IndikatorController extends Controller
{
    public function all() {
        return Indikator::get();
    }

    public function dataByStandarId($id) {
        return DB::table('indikator')
            ->selectRaw('indikator.*, AVG(rs.nilai) as nilai')
            ->join('sub_indikator as si','si.indikator_id','indikator.id')
            ->join('raport_sekolah as rs','rs.sub_indikator_id','si.id')
            ->where('standar_id',$id)
            ->groupBy('indikator.id')->get();
    }

    public function tambah(Request $request) {
        Indikator::create([
            "tahun" => $request->tahun,
            "nomor" => $request->nomor,
            "nama" => $request->nama,
            "status" => $request->status,
            "standar_id" => $request->standar_id,
        ]);
        return redirect("/dataMaster");
    }

    public function edit($id) {
        return Indikator::find($id);
    }
    
    public function ubah(Request $request, $id) {
        $indikator = Indikator::find($id);
        $indikator->tahun = $request->tahun;
        $indikator->nomor = $request->nomor;
        $indikator->nama = $request->nama;
        $indikator->status = $request->status;
        $indikator->standar_id = $request->standar_id;
        $indikator->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        Indikator::find($id)->delete();
        return redirect("/dataMaster");
    }
}
