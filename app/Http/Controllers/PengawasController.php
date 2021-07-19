<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengawas;
use App\Models\SiklusPeriode;
use App\Models\SekolahPengawas;
use App\Models\RaportSekolah;
use Carbon\Carbon;

class PengawasController extends Controller
{
    public function home (){
        $data_log = ['LoggedUserInfo'=>Pengawas::where('id','=', session('LoggedUserPengawas'))-> first()];
        return view('/pengawas/index', $data_log);
    }

	public function dataOperasional(){
        $data_log = ['LoggedUserInfo'=>Pengawas::where('id','=', session('LoggedUserPengawas'))-> first()];
        
        $today = Carbon::today();
        $date = $today->toDateString();
        $siklus = SiklusPeriode::orderBy('tanggal_mulai',"desc")
            ->where('tanggal_mulai','<=',$date)
            ->first();
        
        $data = [
            "siklus" => $siklus,
        ];
		return view('/pengawas/dataOperasional', $data, $data_log);
	}

    public function dataMaster(){
        $data_log = ['LoggedUserInfo'=>Pengawas::where('id','=', session('LoggedUserPengawas'))-> first()];
        $listSekolahPengawas = SekolahPengawas::where('pengawas_id', session('LoggedUserPengawas'))->get();
        $rapot_sekolah = RaportSekolah::all();
        $data = [
            "listSekolahPengawas" => $listSekolahPengawas,
            "rapot_sekolah" => $rapot_sekolah,
        ];
		return view('/pengawas/dataMaster', $data, $data_log);
	}

    public function laporan(){
        $data_log = ['LoggedUserInfo'=>Pengawas::where('id','=', session('LoggedUserPengawas'))-> first()];
		return view('/pengawas/laporan', $data_log);
	}

    public function tambah(Request $request) {
        Pengawas::create([
            "nama" => $request->nama,
            "username" => $request->username,
            "password" => $request->password,
            "asal" => $request->asal,
        ]);
        return redirect("/dataMaster");
    }

    public function edit($id) {
        $pengawas = Pengawas::find($id);
        return json_encode($pengawas);
    }
    
    public function ubah(Request $request, $id) {
        $pengawas = Pengawas::find($id);
        $pengawas->nama = $request->nama;
        $pengawas->username = $request->username;
        $pengawas->password = $request->password;
        $pengawas->asal = $request->asal;
        $pengawas->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        Pengawas::find($id)->delete();
        return redirect("/dataMaster");
    }
}