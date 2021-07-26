<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkarMasalahMaster;

class AkarMasalahMasterController extends Controller
{
    public function tambah(Request $request) {
        AkarMasalahMaster::create([
            'tahun' => $request->tahun,
            'deskripsi'=> $request->deskripsi,
        ]);
        return redirect("/dataMaster");
    }

    public function edit($id) {
        return AkarMasalahMaster::find($id);
    }
    
    public function ubah(Request $request, $id) {
        $AkarMasalahMaster = AkarMasalahMaster::find($id);
        $AkarMasalahMaster->tahun = $request->tahun;
        $AkarMasalahMaster->deskripsi = $request->deskripsi;
        $AkarMasalahMaster->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        AkarMasalahMaster::find($id)->delete();
        return redirect("/dataMaster");
    }
}
