<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RaportKPI;

class RaportKPIController extends Controller
{
    public function tambah(Request $request) {
        RaportKPI::create([
            "tahun" => $request->tahun,
            "nilai_kpi" => $request->nilai_kpi,
            "kota_kabupaten_id" => $request->kota_kabupaten_id,
            "sub_indikator_id" => $request->sub_indikator_id,
        ]);
        return redirect("/dataSetting");
    }

    public function edit($id) {
        return RaportKPI::find($id);
    }
    
    public function ubah(Request $request, $id) {
        $raportKPI = RaportKPI::find($id);
        $raportKPI->tahun = $request->tahun;
        $raportKPI->nilai_kpi = $request->nilai_kpi;
        $raportKPI->kota_kabupaten_id = $request->kota_kabupaten_id;
        $raportKPI->sub_indikator_id = $request->sub_indikator_id;
        $raportKPI->save();

        return redirect("/dataSetting");
    }
    
    public function hapus($id) {
        RaportKPI::find($id)->delete();
        return redirect("/dataSetting");
    }
}
