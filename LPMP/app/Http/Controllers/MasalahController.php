<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masalah;
use Carbon\Carbon;

class MasalahController extends Controller
{
    public function dataByIndikatorId($id) {
        return Masalah::where('indikator_id',$id)->get();
    }
    
    public function tambah(Request $request) {
        Masalah::create([
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
        return Masalah::find($id);
    }

    public function ubah(Request $request, $id) {
        $masalah = Masalah::find($id);
        $masalah->deskripsi = $request->deskripsi;
        $masalah->indikator_id = $request->indikator_id;
        $masalah->save();
        return redirect('/tpmps/dataOperasional');
    }

    public function hapus($id) {
        Masalah::find($id)->delete();
        return redirect('/tpmps/dataOperasional');
    }
}
