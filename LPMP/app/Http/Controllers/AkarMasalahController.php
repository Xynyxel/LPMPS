<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AkarMasalah;
use Carbon\Carbon;

class AkarMasalahController extends Controller
{
    public function dataByIndikatorId($id) {
        return AkarMasalah::where('indikator_id',$id)->get();
    }

    public function tambah(Request $request) {
        AkarMasalah::create([
            'tahun' => Carbon::now()->isoFormat('YYYY'),
            'deskripsi'=> $request->deskripsi,
            'status' => 0,
            'datetime' => Carbon::now(),
            'sekolah_id' => $request->sekolah_id,
            'indikator_id' => $request->indikator_id,
        ]);
        return redirect("/tpmps/dataOperasional");
    }

    public function edit($id) {
        return AkarMasalah::find($id);
    }

    public function ubah(Request $request, $id) {
        $akarMasalah = AkarMasalah::find($id);
        $akarMasalah->deskripsi = $request->deskripsi;
        $akarMasalah->indikator_id = $request->indikator_id;
        $akarMasalah->save();
        return redirect('/tpmps/dataOperasional');
    }

    public function hapus($id) {
        AkarMasalah::find($id)->delete();
        return redirect('/tpmps/dataOperasional');
    }
}
