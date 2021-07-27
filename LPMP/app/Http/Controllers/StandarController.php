<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standar;

class StandarController extends Controller
{
    public function all() {
        return Standar::get();
    }

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
        return Standar::find($id);
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
