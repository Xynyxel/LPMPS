<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LPMP;
use App\Models\TPMPS;
use App\Models\SiklusPeriode;
use App\Models\Sekolah;
use App\Models\PengajuanSiklus;
use App\Models\PengajuanSiklusKomunikasi;
use Carbon\Carbon;

class LPMPController extends Controller
{
    public function home (){
        $data_log = ['LoggedUserInfo'=>LPMP::where('id','=', session('LoggedUserLpmp'))-> first()];
        
        $data = [
            "siklus" => siklus(),
        ];
        return view('/lpmp/index',$data,$data_log);
    }

	public function dataOperasional(){
        $data_log = ['LoggedUserInfo'=>LPMP::where('id','=', session('LoggedUserLpmp'))-> first()];
        $listSekolah = Sekolah::all();
        $idSiklus = siklus();
        if($idSiklus=="")   $idSiklus = 0;
        else                $idSiklus = siklus()->id;
        $pengajuanSiklus = PengajuanSiklus::where('siklus_periode_id', $idSiklus)->get();
        
        $data = [
            "siklus" => siklus(),
            "listSekolah" => $listSekolah,
            "listPengajuanSiklus" => $pengajuanSiklus
        ];
		return view('/lpmp/dataOperasional', $data, $data_log);
	}

    public function laporan(){
        $data_log = ['LoggedUserInfo'=>LPMP::where('id','=', session('LoggedUserLpmp'))-> first()];
        
        $data = [
            "siklus" => siklus(),
            "listSekolah" => Sekolah::all()
        ];
		return view('/lpmp/laporan', $data, $data_log);
	}

    public function comment(Request $request) {
        // var_dump($request);die;
        $tpmps = TPMPS::where('sekolah_id', $request->sekolah)->first();
        $pengajuan_siklus = PengajuanSiklus::join('tpmps as t','t.id','pengajuan_siklus.tpmps_id')
            ->where('pengajuan_siklus.tpmps_id',$tpmps->id)
            ->orderBy('tanggal_pengajuan','DESC')
            ->first();
        PengajuanSiklusKomunikasi::create([
            "komentar" => $request->comment,
            "tanggal_komentar" => Carbon::now(),
            "status_pemberi_komentar" => 3,
            "pengajuan_siklus_id" => $pengajuan_siklus->id,
        ]);
        return redirect()->back();
    }

    public function comments($id) {
        $tpmps = TPMPS::where('sekolah_id', $id)->first();
        $idSiklus = siklus();
        if($idSiklus=="")   $idSiklus = 0;
        else                $idSiklus = siklus()->id;
        return PengajuanSiklusKomunikasi::join('pengajuan_siklus as ps','ps.id','pengajuan_siklus_komunikasi.pengajuan_siklus_id')
            ->where('ps.tpmps_id',$tpmps->id)
            ->where('ps.siklus_periode_id',$idSiklus)
            ->get();
    }
    
    public function tambah(Request $request) {
        LPMP::create([
            "nama" => $request->nama,
            "username" => $request->username,
            "password" => $request->password,
        ]);
        return redirect("/dataMaster");
    }

    public function edit($id) {
        return LPMP::find($id);
    }
    
    public function ubah(Request $request, $id) {
        $lpmp = LPMP::find($id);
        $lpmp->nama = $request->nama;
        $lpmp->username = $request->username;
        $lpmp->password = $request->password;
        $lpmp->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        LPMP::find($id)->delete();
        return redirect("/dataMaster");
    }

    public function diproses($id){
        $pengajuanSiklus = PengajuanSiklus::find($id);
        $pengajuanSiklus->status = 2;
        $pengajuanSiklus->save();
        return redirect('/lpmp/dataOperasional');
    }

    public function diterima($id){
        $pengajuanSiklus = PengajuanSiklus::find($id);
        $pengajuanSiklus->status = 3;
        $pengajuanSiklus->save();
        return redirect('/lpmp/dataOperasional');
    }

    public function komunikasi($id){
        $pengajuanSiklus = PengajuanSiklus::find($id);
        $pengajuanSiklus->status = 4;
        $pengajuanSiklus->save();
        return redirect('/lpmp/dataOperasional');
    }
}
