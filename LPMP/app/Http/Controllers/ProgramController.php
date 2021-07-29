<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\ProgramRekomendasi;
use Carbon\Carbon;

class ProgramController extends Controller
{
    public function dataByRekomendasiId($id) {
        return ProgramRekomendasi::join('program as p','p.id','program_rekomendasi.program_id')
            ->where('program_rekomendasi.rekomendasi_id',$id)
            ->get();
    }
    
    public function tambah(Request $request) {
        $program = Program::where('sekolah_id', $request->sekolah_id)-> where('deskripsi',$request->deskripsi)->first();
        if(! $program){
            Program::create([
                'tahun' => Carbon::now()->isoFormat('YYYY'),
                'deskripsi'=> $request->deskripsi,
                'status' => 0,
                'datetime' => Carbon::now(),
                'sekolah_id' => $request->sekolah_id,
            ]);
            $program = Program::where('sekolah_id', $request->sekolah_id)-> where('deskripsi',$request->deskripsi)->first();
        }
        
        
        ProgramRekomendasi::create([
            'program_id' => $program->id,
            'rekomendasi_id' => $request->rekomendasi_id,
        ]);
        return redirect("/tpmps/dataOperasional");
    }
}
