<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekomendasi;
use Carbon\Carbon;

class RekomendasiController extends Controller
{
    public function tambah(Request $request) {
        $newRekomendasi =  Rekomendasi::create([
            'tahun' => Carbon::now()->isoFormat('YYYY'),
            'deskripsi'=> $request->deskripsi,
            'status' => 0,
            'datetime' => Carbon::now(),
            'sekolah_id' => $request->sekolah_id,
            'indikator_id' => $request->indikator_id,
        ]);
        if(!$newRekomendasi){
            return redirect("/tpmps/dataOperasional")->with('fail','There Something Wrong');
        }
        return redirect("/tpmps/dataOperasional");
    }
}
