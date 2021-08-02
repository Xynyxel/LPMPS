<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LPMP;
use App\Models\SiklusPeriode;
use App\Models\Sekolah;
use Carbon\Carbon;
use App\Models\PengajuanSiklus;

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
        $pengajuanSiklus = PengajuanSiklus::where('siklus_periode_id', siklus()->id)->get();
        
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
