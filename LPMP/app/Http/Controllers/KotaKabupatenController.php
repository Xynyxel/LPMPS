<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaKabupaten;

class KotaKabupatenController extends Controller
{
    public function tambah(Request $request) {
        KotaKabupaten::create([
            "nama" => $request->nama
        ]);
        return redirect("/dataMaster");
    }

    public function edit($id) {
        return KotaKabupaten::find($id);
    }
    
    public function ubah(Request $request, $id) {
        $kotaKabupaten = KotaKabupaten::find($id);
        $kotaKabupaten->nama = $request->nama;
        $kotaKabupaten->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        KotaKabupaten::find($id)->delete();
        return redirect("/dataMaster");
    }
}