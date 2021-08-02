<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSiklus;
use Illuminate\Http\Request;
use App\Models\Pengawas;
use App\Models\SiklusPeriode;
use App\Models\Sekolah;
use App\Models\SekolahPengawas;
use App\Models\RaportSekolah;
use App\Models\PengajuanSiklusKomunikasi;
use App\Models\TPMPS;
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
        $listSekolah = Sekolah::join('sekolah_pengawas as sp',"sp.sekolah_id","sekolah.id")
            ->where('sp.pengawas_id',$data_log["LoggedUserInfo"]->id)
            ->get();
        $pengajuanSiklus = PengajuanSiklus::where('siklus_periode_id', siklus()->id)->get();

        $data = [
            "siklus" => siklus(),
            "listPeriode" => $listPeriode,
            "listSekolah" => $listSekolah,
            "listPengajuanSiklus" => $pengajuanSiklus
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
            "status_pemberi_komentar" => 2,
            "pengajuan_siklus_id" => $pengajuan_siklus->id,
        ]);
        return redirect()->back();
    }

    public function comments($id) {
        $tpmps = TPMPS::where('sekolah_id', $id)->first();
        return PengajuanSiklusKomunikasi::join('pengajuan_siklus as ps','ps.id','pengajuan_siklus_komunikasi.pengajuan_siklus_id')
            ->where('ps.tpmps_id',$tpmps->id)
            ->where('ps.siklus_periode_id',siklus()->id)
            ->get();
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

    public function diproses($id){
        $pengajuanSiklus = PengajuanSiklus::find($id);
        $pengajuanSiklus->status = 2;
        $pengajuanSiklus->save();
        return redirect('/pengawas/dataOperasional');
    }

    public function diterima($id){
        $pengajuanSiklus = PengajuanSiklus::find($id);
        $pengajuanSiklus->status = 3;
        $pengajuanSiklus->save();
        return redirect('/pengawas/dataOperasional');
    }

    public function komunikasi($id){
        $pengajuanSiklus = PengajuanSiklus::find($id);
        $pengajuanSiklus->status = 4;
        $pengajuanSiklus->save();
        return redirect('/pengawas/dataOperasional');
    }
}
