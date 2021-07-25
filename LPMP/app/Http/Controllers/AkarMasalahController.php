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
        ]);
        return redirect("/dataMaster");
    }

    public function edit($id) {
        return AkarMasalah::find($id);
    }
    
    public function ubah(Request $request, $id) {
        $akarMasalah = AkarMasalah::find($id);
        $akarMasalah->tahun = $request->tahun;
        $akarMasalah->deskripsi = $request->deskripsi;
        $akarMasalah->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        AkarMasalah::find($id)->delete();
        return redirect("/dataMaster");
    }
}
