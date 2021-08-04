<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiklusPeriode;

class SiklusPeriodeController extends Controller
{
    public function tambah(Request $request) {
        SiklusPeriode::create([
            "siklus" => $request->siklus,
            "tanggal_mulai" => $request->tanggal_mulai,
            "tanggal_selesai" => $request->tanggal_selesai,
        ]);
        return redirect("/dataOperasional");
    }

    public function edit($id) {
        return SiklusPeriode::find($id);
    }
    
    public function ubah(Request $request, $id) {
        if ($id > 1) {
            $check = SiklusPeriode::where('id',$id-1)
                ->where('tanggal_selesai','>',$request->tanggal_mulai)->get();
            if ($check->count() > 0) {
                return redirect("/dataOperasional")->with('fail','Tanggal sudah ditempati oleh siklus lain');
            }
        }
        
        $siklusPeriode = SiklusPeriode::find($id);
        $siklusPeriode->siklus = $request->siklus;
        $siklusPeriode->tanggal_mulai = $request->tanggal_mulai;
        $siklusPeriode->tanggal_selesai = $request->tanggal_selesai;
        $siklusPeriode->save();

        return redirect("/dataOperasional");
    }
    
    public function hapus($id) {
        SiklusPeriode::find($id)->delete();
        return redirect("/dataOperasional");
    }
}
