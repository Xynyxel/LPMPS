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

//imports
use App\Imports\RapotSekolahImport;
use App\Imports\StandarImport;
use App\Imports\IndikatorImport;
use App\Imports\SubIndikatorImport;

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
		$rapotSekolah = RaportSekolah::all();
		$standar = Standar::all();
		$indikator = Indikator::all();
		$subIndikator = SubIndikator::all();
        
        $data = [
            "siklus" => siklus(),
			'rapot_sekolah' => $rapotSekolah, 
			'standar'=>$standar,
			'indikator'=>$indikator,
			'sub_indikator'=>$subIndikator,
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

    public function import_excel_standar(Request $request) 
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
		$file->move('file_standar',$nama_file);
 
		// import data
		Excel::import(new StandarImport, public_path('/file_standar/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses_standar','Data Standar Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/tpmps/dataOperasional');
	}

	public function import_excel_indikator(Request $request) 
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
		$file->move('file_indikator',$nama_file);
 
		// import data
		Excel::import(new IndikatorImport, public_path('/file_indikator/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses_indikator','Data Indikator Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/tpmps/dataOperasional');
	}

	public function import_excel_sub_indikator(Request $request) 
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
		$file->move('file_sub_indikator',$nama_file);
 
		// import data
		Excel::import(new SubIndikatorImport, public_path('/file_sub_indikator/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses_subindikator','Data Sub Indikator Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/tpmps/dataOperasional');
	}

	public function import_excel_rapot_sekolah(Request $request) 
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
		$file->move('file_rapot_sekolah',$nama_file);
 
		// import data
		Excel::import(new RapotSekolahImport, public_path('/file_rapot_sekolah/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses_rapotsekolah','Data Rapot Sekolah Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/tpmps/dataOperasional');
	}

    public function edit($id) {
        $tpmps = TPMPS::find($id);
        return json_encode($tpmps);
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
}
