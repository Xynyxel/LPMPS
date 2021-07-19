<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standar;

class StandarController extends Controller
{
    public function tambah(Request $request) {
        Standar::create([
            "tahun" => $request->tahun,
            "nomor" => $request->nomor,
            "nama" => $request->nama,
            "status" => $request->status,
        ]);
        return redirect("/dataMaster");
    }

    public function edit($id) {
        $standar = Standar::find($id);
        return json_encode($standar);
    }
    
    public function ubah(Request $request, $id) {
        $standar = Standar::find($id);
        $standar->tahun = $request->tahun;
        $standar->nomor = $request->nomor;
        $standar->nama = $request->nama;
        $standar->status = $request->status;
        $standar->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        Standar::find($id)->delete();
        return redirect("/dataMaster");
    }
}
