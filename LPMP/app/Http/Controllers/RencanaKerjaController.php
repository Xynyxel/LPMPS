<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RencanaKerja;
use Carbon\Carbon;

class RencanaKerjaController extends Controller
{
    public function dataByKegiatanId($id) {
        return RencanaKerja::where('kegiatan_id',$id)->get();
    }
    
    public function tambah(Request $request) {
        RencanaKerja::create([
            'indikator_kinerja' => $request->indikator_kinerja,
            'volume' => $request->volume,
            'biaya' => $request->biaya,
            'sumber_daya' => $request->sumber_daya,
            'is_dana_bos' => $request->is_dana_bos,
            'status' => 0,
            'datetime' => Carbon::now(),
            'kegiatan_id' => $request->kegiatan_id,
        ]);
        return redirect("/tpmps/dataOperasional");
    }
}
