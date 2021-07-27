<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use Carbon\Carbon;

class ProgramController extends Controller
{
    public function tambah(Request $request) {
        Program::create([
            'tahun' => Carbon::now()->isoFormat('YYYY'),
            'deskripsi'=> $request->deskripsi,
            'status' => 0,
            'datetime' => Carbon::now(),
            'sekolah_id' => $request->sekolah_id,
        ]);
        return redirect("/tpmps/dataOperasional");
    }
}
