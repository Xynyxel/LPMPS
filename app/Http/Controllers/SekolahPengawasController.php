<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SekolahPengawas;
use Carbon\Carbon;

class SekolahPengawasController extends Controller
{
    public function tambah(Request $request) {
        SekolahPengawas::create([
            "tahun" => Carbon::now()->isoFormat('YYYY'),
            "tgl_sk" => $request->tgl_sk,
            "nomor_sk" => $request->no_sk,
            "sekolah_id" => $request->sekolah_id,
            "pengawas_id" => $request->pengawas_id,
        ]);
        return redirect("/dataSetting");
    }

    public function edit($id) {
        $sekolahPengawas = SekolahPengawas::find($id);
        return json_encode($sekolahPengawas);
    }
    
    public function ubah(Request $request, $id) {
        $sekolahPengawas = SekolahPengawas::find($id);
        $sekolahPengawas->tgl_sk = $request->tgl_sk;
        $sekolahPengawas->nomor_sk = $request->no_sk;
        $sekolahPengawas->sekolah_id = $request->sekolah_id;
        $sekolahPengawas->pengawas_id = $request->pengawas_id;
        $sekolahPengawas->save();

        return redirect("/dataSetting");
    }
    
    public function hapus($id) {
        SekolahPengawas::find($id)->delete();
        return redirect("/dataSetting");
    }
}
