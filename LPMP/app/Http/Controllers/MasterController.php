<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaKabupaten;
use App\Models\Standar;
use App\Models\Sekolah;
use App\Models\Indikator;
use App\Models\SubIndikator;
use App\Models\AkarMasalah;
use App\Models\Admin;
use App\Models\TPMPS;
use App\Models\Pengawas;
use App\Models\LPMP;
use App\Models\SiklusPeriode;
use App\Models\SekolahPengawas;
use App\Models\RaportSekolah;
use App\Models\RaportKPI;
use Carbon\Carbon;

class MasterController extends Controller
{
    public function index() {
        $data_log = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))-> first()];
        $data = [
            "siklus" => siklus(),
        ];
        return view('/admin/index', $data, $data_log);
    }

    public function dataMaster() {
        $data_log = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))-> first()];
        $kotakab = KotaKabupaten::all();
        $standar = Standar::all();
        $sekolah = Sekolah::all();
        $indikator = Indikator::all();
        $subIndikator = SubIndikator::all();
        $akarMasalah = AkarMasalah::all();
        $tpmps = TPMPS::all();
        $pengawas = Pengawas::all();
        $lpmp = LPMP::all();

        $data = [
            "siklus" => siklus(),
            "kotakab" => $kotakab,
            "listSekolah" => $sekolah,
            "listStandar" => $standar,
            "listIndikator" => $indikator,
            "listSubIndikator" => $subIndikator,
            "listAkarMasalah" => $akarMasalah,
            "listTPMPS" => $tpmps,
            "listPengawas" => $pengawas,
            "listLPMP" => $lpmp,
        ];
        return view('/admin/dataMaster',$data, $data_log);
    }

    public function dataSetting() {
        $data_log = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))-> first()];
        $listSekolahPengawas = SekolahPengawas::all();
        $listSekolah = Sekolah::all();
        $listPengawas = Pengawas::all();
        $listRaportKPI = RaportKPI::all();
        $listSubIndikator = SubIndikator::all();
        $listKotaKabupaten = KotaKabupaten::all();
        
        $data = [
            "siklus" => siklus(),
            "listSekolahPengawas" => $listSekolahPengawas,
            "listSekolah" => $listSekolah,
            "listPengawas" => $listPengawas,
            "listRaportKPI" => $listRaportKPI,
            "listSubIndikator" => $listSubIndikator,
            "listKota" => $listKotaKabupaten,
        ];
        return view('/admin/dataSetting',$data, $data_log);
    }

    public function dataOperasional() {
        $data_log = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))-> first()];
        $listPeriode = SiklusPeriode::all();
        $listSekolah = Sekolah::all();

        $data = [
            "siklus" => siklus(),
            "listPeriode" => $listPeriode,
            "listSekolah" => $listSekolah,
        ];
        return view('/admin/dataOperasional',$data, $data_log);
    }

    public function laporan() {
        $data_log = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))-> first()];
        $listPeriode = SiklusPeriode::all();
        $listSekolah = Sekolah::all();

        $data = [
            "siklus" => siklus(),
            "listPeriode" => $listPeriode,
            "listSekolah" => $listSekolah
        ];
        return view('/admin/laporan',$data, $data_log);
    }

    public function siklus1($id) {
        $listPemetaanMutu = Standar::select(
                "standar.nomor as nomor_standar",
                "standar.nama as nama_standar",
                "i.id as id_indikator",
                "i.nama as nama_indikator",
                "i.nomor as nomor_indikator",
                "si.nomor as nomor_sub_indikator",
                "si.nama as nama_sub_indikator",
                "rs.nilai as nilai_raport",
                "m.deskripsi as deskripsi_masalah",
                "r.deskripsi as deskripsi_rekomendasi",
                "am.deskripsi as deskripsi_akar_masalah",
            )
            ->join('indikator as i','i.standar_id','standar.id')
            ->join('sub_indikator as si','si.indikator_id','i.id')
            ->join('akar_masalah as am','am.indikator_id','i.id')
            ->join('masalah as m','m.indikator_id','i.id')
            ->join('rekomendasi as r','r.indikator_id','i.id')
            ->join('raport_sekolah as rs','rs.sub_indikator_id','si.id')
            ->where('r.sekolah_id',$id)
            ->where('am.sekolah_id',$id)
            ->where('m.sekolah_id',$id)
            ->where('rs.sekolah_id',$id)
            ->get();
        return $listPemetaanMutu;
    }

    public function avgIndikator($id) {
        return SubIndikator::join('raport_sekolah as rs','rs.sub_indikator_id','sub_indikator.id')
            ->where('sub_indikator.indikator_id',$id)
            ->avg('rs.nilai');
    }
    
    // public function standar($id) {
    //     $listStandar = Standar::select("standar.*")
    //         ->join('indikator as i','i.standar_id','standar.id')
    //         ->join('sub_indikator as s','s.indikator_id','i.id')
    //         ->join('raport_sekolah as r','r.sub_indikator_id','s.id')
    //         ->where('r.sekolah_id',$id)->get();
    //     return json_encode($listStandar);
    // }

    // public function indikator($id) {
    //     return Indikator::where('standar_id',$id)->get();
    // }

    // public function subIndikator($id) {
    //     return SubIndikator::where('indikator_id',$id)->get();
    // }

    // public function raportSekolah($id) {
    //     return RaportSekolah::where('sub_indikator_id',$id)->get();
    // }

    // public function akarMasalah($id) {
    //     return AkarMasalah::where('indikator_id',$id)->get();
    // }
}
