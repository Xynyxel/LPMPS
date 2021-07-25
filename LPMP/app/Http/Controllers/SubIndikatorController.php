<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubIndikator;

class SubIndikatorController extends Controller
{
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
