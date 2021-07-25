<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\RaportSekolah;

class SekolahController extends Controller
{
    public function tambah(Request $request) {
        Sekolah::create([
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "telefon" => $request->no_telp,
            "kota_kabupaten_id" => $request->kota,
        ]);
        return redirect("/dataMaster");
    }

    public function fillRaport($id) {
        $sekolah = RaportSekolah::where('sekolah_id',$id)->get();
        $array = [];
        foreach($sekolah as $s) {
            array_push($array, (object) [
                'sub_indikator' => $s->subIndikator->nama,
                'nilai' => $s->nilai,
            ]);
        }
        return json_encode($array);
    }

    public function edit($id) {
        return Sekolah::find($id);
    }
    
    public function ubah(Request $request, $id) {
        $sekolah = Sekolah::find($id);
        $sekolah->nama = $request->nama;
        $sekolah->alamat = $request->alamat;
        $sekolah->telefon = $request->no_telp;
        $sekolah->kota_kabupaten_id = $request->kota;
        $sekolah->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        Sekolah::find($id)->delete();
        return redirect("/dataMaster");
    }
}
