<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramRekomendasi;
use Carbon\Carbon;

class ProgramRekomendasiController extends Controller
{
    public function tambah(Request $request) {
        ProgramRekomendasi::create([
            'program_id' => $request->program_id,
            'sekolah_id' => $request->sekolah_id,
        ]);
        return redirect("/tpmps/dataOperasional");
    }
}
