<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RealisasiKerja;
use Carbon\Carbon;

class RealisasiKerjaController extends Controller
{
    public function dataByKegiatanId($id) {
        return RealisasiKerja::where('kegiatan_id',$id)->get();
    }
    public function tambah(Request $request) {
        RealisasiKerja::create([
            'penanggung_jawab' => $request->penanggung_jawab,
            'pemangku_kepentingan' => $request->pemangku_kepentingan,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
            'bukti_fisik_keterangan' => $request->bukti_fisik_keterangan,
            'bukti_fisik_url' => $request->bukti_fisik_url,
            'status' => 0,
            'datetime' => Carbon::now(),
            'kegiatan_id' => $request->kegiatan_id,
        ]);
        return redirect("/tpmps/dataOperasional");
    }
}
