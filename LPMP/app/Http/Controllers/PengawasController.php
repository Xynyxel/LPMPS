<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengawas;
use App\Models\SiklusPeriode;
use App\Models\Sekolah;
use App\Models\SekolahPengawas;
use App\Models\RaportSekolah;
use Carbon\Carbon;

class PengawasController extends Controller
{
    public function home (){
        $data_log = ['LoggedUserInfo'=>Pengawas::where('id','=', session('LoggedUserPengawas'))-> first()];
        
        $data = [
            "siklus" => siklus(),
        ];
        return view('/pengawas/index', $data, $data_log);
    }

	public function dataOperasional(){
        $data_log = ['LoggedUserInfo'=>Pengawas::where('id','=', session('LoggedUserPengawas'))-> first()];
        $listPeriode = SiklusPeriode::all();
        $listSekolah = Sekolah::all();

        $data = [
            "siklus" => siklus(),
            "listPeriode" => $listPeriode,
            "listSekolah" => $listSekolah,
        ];
		return view('/pengawas/dataOperasional', $data, $data_log);
	}

    public function dataMaster(){
        $data_log = ['LoggedUserInfo'=>Pengawas::where('id','=', session('LoggedUserPengawas'))-> first()];
        $listSekolahPengawas = SekolahPengawas::where('pengawas_id', session('LoggedUserPengawas'))->get();
        $rapot_sekolah = RaportSekolah::join('sekolah_pengawas as sp','sp.sekolah_id','raport_sekolah.sekolah_id')
            ->where('sp.pengawas_id',session('LoggedUserPengawas'))
            ->get();

        $data = [
            "listSekolahPengawas" => $listSekolahPengawas,
            "rapot_sekolah" => $rapot_sekolah,
            "siklus" => siklus(),
        ];
		return view('/pengawas/dataMaster', $data, $data_log);
	}

    public function laporan(){
        $data_log = ['LoggedUserInfo'=>Pengawas::where('id','=', session('LoggedUserPengawas'))-> first()];
        $listSekolah = Sekolah::join('sekolah_pengawas as sp',"sp.sekolah_id","sekolah.id")
            ->where('sp.pengawas_id',$data_log["LoggedUserInfo"]->id)
            ->get();

        $data = [
            "siklus" => siklus(),
            "listSekolah" => $listSekolah
        ];
		return view('/pengawas/laporan', $data, $data_log);
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
        return Pengawas::find($id);
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
