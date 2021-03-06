<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaKabupaten;
use App\Models\Standar;
use App\Models\Sekolah;
use App\Models\Indikator;
use App\Models\SubIndikator;
use App\Models\AkarMasalahMaster;
use App\Models\Admin;
use App\Models\TPMPS;
use App\Models\Pengawas;
use App\Models\LPMP;
use App\Models\SiklusPeriode;
use App\Models\SekolahPengawas;
use App\Models\RaportSekolah;
use App\Models\RaportKPI;
use App\Models\Rekomendasi;
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
        $akarMasalah = AkarMasalahMaster::all();
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
}
