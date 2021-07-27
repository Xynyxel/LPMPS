<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RealisasiKerja;
use Carbon\Carbon;

class RealisasiKerjaController extends Controller
{
    public function tambah(Request $request) {
        RealisasiKerja::create([
            'penanggung_jawab' => $request->penanggung_jawab,
            'pemangku_kepetingan' => $request->pemangku_kepetingan,
            'waktu_pelaksanaan' => $request->waktu_pelakasanaan,
            'bukti_fisik_keterangan' => $request->bukti_fisik_keterangan,
            'bukti_fisik_url' => $request->bukti_fisik_url,
            'status' => 0,
            'datetime' => Carbon::now(),
            'sekolah_id' => $request->sekolah_id,
        ]);
        return redirect("/tpmps/dataOperasional");
    }
}
