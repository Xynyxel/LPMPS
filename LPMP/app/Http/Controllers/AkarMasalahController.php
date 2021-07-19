<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkarMasalah;

class AkarMasalahController extends Controller
{
    public function tambah(Request $request) {
        AkarMasalah::create([
            'tahun' => $request->tahun,
            'deskripsi'=> $request->deskripsi,
            'status'=> $request->status,
            'sekolah_id'=> $request->sekolah_id,
            'indikator_id'=> $request->indikator_id,
        ]);
        return redirect("/dataMaster");
    }

    public function edit($id) {
        $akarMasalah = AkarMasalah::find($id);
        return json_encode($akarMasalah);
    }
    
    public function ubah(Request $request, $id) {
        $akarMasalah = AkarMasalah::find($id);
        $akarMasalah->tahun = $request->tahun;
        $akarMasalah->deskripsi = $request->deskripsi;
        $akarMasalah->status = $request->status;
        $akarMasalah->sekolah_id = $request->sekolah_id;
        $akarMasalah->indikator_id = $request->indikator_id;
        $akarMasalah->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        AkarMasalah::find($id)->delete();
        return redirect("/dataMaster");
    }
}
