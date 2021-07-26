<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// library needed
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Carbon\Carbon;

//models
use App\Models\RaportSekolah;
use App\Models\Standar;
use App\Models\Indikator;
use App\Models\SubIndikator;
use App\Models\TPMPS;
use App\Models\SiklusPeriode;
use App\Models\AkarMasalahMaster;


//imports
use App\Imports\RapotSekolahImport;
use App\Imports\StandarImport;
use App\Imports\IndikatorImport;
use App\Imports\SubIndikatorImport;
use App\Imports\PemenuhanMutuImport;

class TPMPSController extends Controller
{
    public function home (){
		$data_log = ['LoggedUserInfo'=>TPMPS::where('id','=', session('LoggedUserTpmps'))-> first()];
		
        $data = [
            "siklus" => siklus(),
        ];
        return view('tpmps/index',$data,$data_log);
    }

	public function dataOperasional(){
		$data_log = ['LoggedUserInfo'=>TPMPS::where('id','=', session('LoggedUserTpmps'))-> first()];
		$indikator = Indikator::all();
        $akarMasalahMaster = AkarMasalahMaster::all();
        
        $data = [
            "siklus" => siklus(),
			'listIndikator'=> $indikator,
            'listAkarMasalahMaster' => $akarMasalahMaster
        ];
		return view('/tpmps/dataOperasional', $data, $data_log);
	}

    public function laporan(){
		$data_log = ['LoggedUserInfo'=>TPMPS::where('id','=', session('LoggedUserTpmps'))-> first()];
		
        $data = [
            "siklus" => siklus(),
        ];
		return view('/tpmps/laporan',$data,$data_log);
	}

    public function tambah(Request $request) {
        TPMPS::create([
            "nama" => $request->nama,
            "username" => $request->username,
            "password" => $request->password,
            "sekolah_id" => $request->sekolah_id,
        ]);
        return redirect("/dataMaster");
    }

    public function edit($id) {
        return TPMPS::find($id);
    }
    
    public function ubah(Request $request, $id) {
        $tpmps = TPMPS::find($id);
        $tpmps->nama = $request->nama;
        $tpmps->username = $request->username;
        $tpmps->password = $request->password;
        $tpmps->sekolah_id = $request->sekolah_id;
        $tpmps->save();

        return redirect("/dataMaster");
    }
    
    public function hapus($id) {
        TPMPS::find($id)->delete();
        return redirect("/dataMaster");
    } 

	public function importExcelPemetaanMutu(Request $request, $id) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('filePemetaanMutu',$nama_file);
 
		// import data
		Excel::import(new PemenuhanMutuImport($id), public_path('/filePemetaanMutu/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('suksesSiklus1','Data Pemetaan Mutu Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/tpmps/dataOperasional');
	}
}
