<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Carbon\Carbon;

class KegiatanController extends Controller
{
    public function dataByProgramId($id) {
        return Kegiatan::where('program_id',$id)->get();
    }

    public function tambah(Request $request) {
        Kegiatan::create([
            'deskripsi'=> $request->deskripsi,
            'status' => 0,
            'datetime' => Carbon::now(),
            'program_id' => $request->program_id,
        ]);
        return redirect("/tpmps/dataOperasional");
    }
}
