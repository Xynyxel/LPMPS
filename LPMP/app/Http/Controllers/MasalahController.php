<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masalah;
use Carbon\Carbon;

class MasalahController extends Controller
{
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
}
