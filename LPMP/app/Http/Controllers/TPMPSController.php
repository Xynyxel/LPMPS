<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// library needed
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Session;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//models
use App\Models\RaportSekolah;
use App\Models\Standar;
use App\Models\Sekolah;
use App\Models\Indikator;
use App\Models\SubIndikator;
use App\Models\TPMPS;
use App\Models\SiklusPeriode;
use App\Models\AkarMasalah;
use App\Models\AkarMasalahMaster;
use App\Models\Rekomendasi;
use App\Models\Masalah;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\RaportSekolahKoreksi;
use App\Models\PengajuanSiklus;
use App\Models\PengajuanSiklusKomunikasi;

//imports
use App\Imports\PemenuhanMutuImport;
use App\Exports\TemplateRaportExport;

class TPMPSController extends Controller
{
    public function home()
    {
        $data_log = ['LoggedUserInfo' => TPMPS::where('id', '=', session('LoggedUserTpmps'))->first()];

        $data = [
            "siklus" => siklus(),
            "pengajuanSiklus" => $this->getPengajuanSiklus()
        ];
        return view('tpmps/index', $data, $data_log);
    }

    public function dataOperasional()
    {
        $data_log = ['LoggedUserInfo' => TPMPS::where('id', '=', session('LoggedUserTpmps'))->first()];
        $siklus = siklus();
        $indikator = Indikator::all();
        $akarMasalahMaster = AkarMasalahMaster::all();
        $akarMasalah = AkarMasalah::where('sekolah_id', $data_log['LoggedUserInfo']->sekolah_id)->get();
        $masalah = Masalah::where('sekolah_id', $data_log['LoggedUserInfo']->sekolah_id)->get();
        $rekomendasi = Rekomendasi::where('sekolah_id', $data_log['LoggedUserInfo']->sekolah_id)->get();
        $program = Program::where('sekolah_id', $data_log['LoggedUserInfo']->sekolah_id)->get();
        $kegiatan = Kegiatan::select('kegiatan.deskripsi as deskripsi', 'kegiatan.id as id')
            ->join('program as p', 'p.id', 'kegiatan.program_id')
            ->where('p.sekolah_id', $data_log['LoggedUserInfo']->sekolah_id)
            ->get();
        $subIndikator = SubIndikator::all();

        $thisYear = Carbon::now()->isoFormat('YYYY');
        $nama_file =  $data_log['LoggedUserInfo']->id . ' _ ' . $thisYear . '.xlsx';
        if (file_exists(public_path('filePemetaanMutu/' . $nama_file))) {
            $verifikasi =  true;
        } else {
            $verifikasi =  false;
        }
        $verifikasiPengajuan = PengajuanSiklus::where('tpmps_id', $data_log['LoggedUserInfo']->id)
            ->where('siklus_periode_id', $siklus->id)
            ->first();
        if ($verifikasiPengajuan) {
            $verifikasiPengajuanCek = true;
        } else {
            $verifikasiPengajuanCek = false;
        }

        $data = [
            "siklus" => $siklus,
            'listIndikator' => $indikator,
            'listAkarMasalahMaster' => $akarMasalahMaster,
            'listAkarMasalah' => $akarMasalah,
            'listMasalah' => $masalah,
            'listRekomendasi' => $rekomendasi,
            'listProgram' => $program,
            'listKegiatan' => $kegiatan,
            'listSubIndikator' => $subIndikator,
            'verifikasi' => $verifikasi,
            'verifikasiPengajuanCek' => $verifikasiPengajuanCek,
            "pengajuanSiklus" => $this->getPengajuanSiklus()
        ];
        return view('/tpmps/dataOperasional', $data, $data_log);
    }

    public function laporan()
    {
        $data_log = ['LoggedUserInfo' => TPMPS::where('id', '=', session('LoggedUserTpmps'))->first()];

        $data = [
            "siklus" => siklus(),
            "sekolah" => Sekolah::where("id", $data_log['LoggedUserInfo']->sekolah_id)->first(),
            "pengajuanSiklus" => $this->getPengajuanSiklus()
        ];
        return view('/tpmps/laporan', $data, $data_log);
    }

    public function comment(Request $request)
    {
        // var_dump($request);die;
        $tpmps = TPMPS::where('id', '=', session('LoggedUserTpmps'))->first();
        $pengajuan_siklus = PengajuanSiklus::join('tpmps as t', 't.id', 'pengajuan_siklus.tpmps_id')
            ->where('pengajuan_siklus.tpmps_id', $tpmps->id)
            ->orderBy('tanggal_pengajuan', 'DESC')
            ->first();
        PengajuanSiklusKomunikasi::create([
            "komentar" => $request->comment,
            "tanggal_komentar" => Carbon::now(),
            "status_pemberi_komentar" => 1,
            "pengajuan_siklus_id" => $pengajuan_siklus->id,
        ]);
        return redirect()->back();
    }

    public function comments()
    {
        $tpmps = TPMPS::where('id', '=', session('LoggedUserTpmps'))->first();
        return PengajuanSiklusKomunikasi::join('pengajuan_siklus as ps', 'ps.id', 'pengajuan_siklus_komunikasi.pengajuan_siklus_id')
            ->where('ps.tpmps_id', $tpmps->id)
            ->where('ps.siklus_periode_id', siklus()->id)
            ->get();
    }

    public function tambah(Request $request)
    {
        try {
            $tpmps_create = TPMPS::create([
                "nama" => $request->nama,
                "username" => $request->username,
                "password" => $request->password,
                "sekolah_id" => $request->sekolah_id,
            ]);
            return redirect("/dataMaster")->with('success', 'Berhasil Menambahkan TPMPS');
        } catch (\Exception $e) {
            return redirect("/dataMaster")->with('fail', 'Gagal Menambahkan TPMPS');
        }
    }

    public function edit($id)
    {
        return TPMPS::find($id);
    }

    public function ubah(Request $request, $id)
    {
        $tpmps = TPMPS::find($id);
        $tpmps->nama = $request->nama;
        $tpmps->username = $request->username;
        $tpmps->password = $request->password;
        $tpmps->sekolah_id = $request->sekolah_id;
        $tpmps->save();

        return redirect("/dataMaster");
    }

    public function hapus($id)
    {
        TPMPS::find($id)->delete();
        return redirect("/dataMaster");
    }

    public function importExcelPemetaanMutu(Request $request, $id, $tpmps_id)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        // $nama_file = $file->getClientOriginalName();
        $thisYear = Carbon::now()->isoFormat('YYYY');
        $nama_file = $tpmps_id . " _ " . $thisYear . ".xlsx";


        // upload ke folder file_siswa di dalam folder public
        $file->move('filePemetaanMutu', $nama_file);

        // import data
        Excel::import(new PemenuhanMutuImport($id), public_path('/filePemetaanMutu/' . $nama_file));

        // notifikasi dengan session
        Session::flash('suksesSiklus1', 'Data Pemetaan Mutu Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/tpmps/dataOperasional');
    }

    public function exportTemplate()
    {
        return Excel::download(new TemplateRaportExport, 'template.xlsx');
    }

    public function koreksiRaportSekolah(Request $request)
    {
        $raportSekolah = RaportSekolah::where('sekolah_id', $request->sekolah_id)
            ->where('sub_indikator_id', $request->sub_indikator_id)
            ->first();
        RaportSekolahKoreksi::create([
            "nilai_koreksi" => $request->nilai_koreksi,
            "datetime" => Carbon::now(),
            "raport_sekolah_id" => $raportSekolah->id,
        ]);
        return redirect('/tpmps/dataOperasional');
    }

    public function ajukan($tpmps_id, $siklus_periode)
    {
        PengajuanSiklus::create([
            "tanggal_pengajuan" => Carbon::now(),
            "status" => 1,
            "tpmps_id" => $tpmps_id,
            "siklus_periode_id" => $siklus_periode
        ]);
        return redirect('/tpmps/dataOperasional');
    }

    function getPengajuanSiklus(){
        $tpmps = TPMPS::where('id', '=', session('LoggedUserTpmps'))->first();
        return PengajuanSiklus::where('tpmps_id', $tpmps->id)
                                        ->where('siklus_periode_id', siklus()->id)
                                        ->first();
    }
}
