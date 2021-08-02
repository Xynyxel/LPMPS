<?php

use Illuminate\Support\Facades\Route;

//Table
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\StandarController;
use App\Http\Controllers\KotaKabupatenController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\SubIndikatorController;
use App\Http\Controllers\AkarMasalahController;
use App\Http\Controllers\AkarMasalahMasterController;
use App\Http\Controllers\PemenuhanMutuController;
use App\Http\Controllers\TPMPSController;
use App\Http\Controllers\PengawasController;
use App\Http\Controllers\LPMPController;
use App\Http\Controllers\SiklusPeriodeController;
use App\Http\Controllers\SekolahPengawasController;
use App\Http\Controllers\RaportKPIController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\MasalahController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramRekomendasiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RencanaKerjaController;
use App\Http\Controllers\RealisasiKerjaController;

//Other
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Sekolah
Route::post('/sekolah/tambah', [SekolahController::class,"tambah"]);
Route::get('/sekolah/edit/{id}', [SekolahController::class,"edit"]);
Route::get('/sekolah/fillRaport/{id}', [SekolahController::class,"fillRaport"]);
Route::post('/sekolah/ubah/{id}', [SekolahController::class,"ubah"]);
Route::get('/sekolah/hapus/{id}', [SekolahController::class,"hapus"]);

// Standar
Route::get('/standar', [StandarController::class,"all"]);
Route::post('/standar/tambah', [StandarController::class,"tambah"]);
Route::get('/standar/edit/{id}', [StandarController::class,"edit"]);
Route::post('/standar/ubah/{id}', [StandarController::class,"ubah"]);
Route::get('/standar/hapus/{id}', [StandarController::class,"hapus"]);

// Kota/Kabupaten
Route::post('/kotaKabupaten/tambah', [KotaKabupatenController::class,"tambah"]);
Route::get('/kotaKabupaten/edit/{id}', [KotaKabupatenController::class,"edit"]);
Route::post('/kotaKabupaten/ubah/{id}', [KotaKabupatenController::class,"ubah"]);
Route::get('/kotaKabupaten/hapus/{id}', [KotaKabupatenController::class,"hapus"]);

// Indikator
Route::get('/indikator', [IndikatorController::class,"all"]);
Route::get('/indikator/{id}', [IndikatorController::class,"dataByStandarId"]);
Route::post('/indikator/tambah', [IndikatorController::class,"tambah"]);
Route::get('/indikator/edit/{id}', [IndikatorController::class,"edit"]);
Route::post('/indikator/ubah/{id}', [IndikatorController::class,"ubah"]);
Route::get('/indikator/hapus/{id}', [IndikatorController::class,"hapus"]);

// SubIndikator
Route::get('/subIndikator', [SubIndikatorController::class,"all"]);
Route::get('/subIndikator/{id}/{sekolah_id}', [SubIndikatorController::class,"dataByIndikatorId"]);
Route::get('/kekuatan/{id}', [SubIndikatorController::class,"kekuatan"]);
Route::get('/kelemahan/{id}', [SubIndikatorController::class,"kelemahan"]);

Route::post('/subIndikator/tambah', [SubIndikatorController::class,"tambah"]);
Route::get('/subIndikator/edit/{id}', [SubIndikatorController::class,"edit"]);
Route::post('/subIndikator/ubah/{id}', [SubIndikatorController::class,"ubah"]);
Route::get('/subIndikator/hapus/{id}', [SubIndikatorController::class,"hapus"]);

// AkarMasalah
Route::get('/akarMasalah/{id}', [AkarMasalahController::class,"dataByIndikatorId"]);

// Rekomendasi
Route::get('/rekomendasi/indikator/{id}', [RekomendasiController::class,"dataByIndikatorId"]);
Route::get('/rekomendasi/standar/{id}/{sekolah_id}', [RekomendasiController::class,"dataByStandarId"]);

// Program
Route::get('/program/{id}', [ProgramController::class,"dataByRekomendasiId"]);

// Kegiatan
Route::get('/kegiatan/{id}', [KegiatanController::class,"dataByProgramID"]);

// Rencana Kinerja
Route::get('/rencanaKerja/{id}', [RencanaKerjaController::class,"dataByKegiatanId"]);

// Rencana Kinerja
Route::get('/realisasiKerja/{id}', [RealisasiKerjaController::class,"dataByKegiatanId"]);

// Masalah
Route::get('/masalah/{id}', [MasalahController::class,"dataByIndikatorId"]);

// AkarMasalahMaster
Route::post('/akarMasalahMaster/tambah', [AkarMasalahMasterController::class,"tambah"]);
Route::get('/akarMasalahMaster/edit/{id}', [AkarMasalahMasterController::class,"edit"]);
Route::post('/akarMasalahMaster/ubah/{id}', [AkarMasalahMasterController::class,"ubah"]);
Route::get('/akarMasalahMaster/hapus/{id}', [AkarMasalahMasterController::class,"hapus"]);

// TPMPS
Route::post('/tpmps/tambah', [TPMPSController::class,"tambah"]);
Route::get('/tpmps/edit/{id}', [TPMPSController::class,"edit"]);
Route::post('/tpmps/ubah/{id}', [TPMPSController::class,"ubah"]);
Route::get('/tpmps/hapus/{id}', [TPMPSController::class,"hapus"]);

// Pengawas
Route::post('/pengawas/tambah', [PengawasController::class,"tambah"]);
Route::get('/pengawas/edit/{id}', [PengawasController::class,"edit"]);
Route::post('/pengawas/ubah/{id}', [PengawasController::class,"ubah"]);
Route::get('/pengawas/hapus/{id}', [PengawasController::class,"hapus"]);

// LPMP
Route::post('/lpmp/tambah', [LPMPController::class,"tambah"]);
Route::get('/lpmp/edit/{id}', [LPMPController::class,"edit"]);
Route::post('/lpmp/ubah/{id}', [LPMPController::class,"ubah"]);
Route::get('/lpmp/hapus/{id}', [LPMPController::class,"hapus"]);

// Siklus Periode
Route::post('/siklusPeriode/tambah', [SiklusPeriodeController::class,"tambah"]);
Route::get('/siklusPeriode/edit/{id}', [SiklusPeriodeController::class,"edit"]);
Route::post('/siklusPeriode/ubah/{id}', [SiklusPeriodeController::class,"ubah"]);
Route::get('/siklusPeriode/hapus/{id}', [SiklusPeriodeController::class,"hapus"]);

// Raport KPI
Route::post('/raportKPI/tambah', [RaportKPIController::class,"tambah"]);
Route::get('/raportKPI/edit/{id}', [RaportKPIController::class,"edit"]);
Route::post('/raportKPI/ubah/{id}', [RaportKPIController::class,"ubah"]);
Route::get('/raportKPI/hapus/{id}', [RaportKPIController::class,"hapus"]);

// Admin
Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',    [AuthController::class, 'login']) -> name('auth.login');
    Route::get('/home', [MasterController::class,"index"]);
    Route::get('/dataSetting', [MasterController::class,"dataSetting"]);
    Route::get('/dataOperasional', [MasterController::class,"dataOperasional"]);
    Route::get('/dataMaster', [MasterController::class,"dataMaster"]);
    Route::get('/laporan', [MasterController::class,"laporan"]);
    // guest
    Route::get('/', [GuestController::class, 'index']);

    // Sekolah-Pengawas
    Route::post('/sekolahPengawas/tambah', [SekolahPengawasController::class,"tambah"]);
    Route::get('/sekolahPengawas/edit/{id}', [SekolahPengawasController::class,"edit"]);
    Route::post('/sekolahPengawas/ubah/{id}', [SekolahPengawasController::class,"ubah"]);
    Route::get('/sekolahPengawas/hapus/{id}', [SekolahPengawasController::class,"hapus"]);

});

// guest
Route::get('/', [GuestController::class, 'index']);

// Lpmp
Route::group(['middleware'=>['AuthCheckLpmp']], function(){
    Route::get('/auth/loginLpmp',[AuthController::class, 'loginLpmp']) -> name('auth.loginLpmp');
    Route::get('/lpmp/home',[LPMPController::class, 'home']);
    Route::get('/lpmp/dataOperasional',[LPMPController::class, 'dataOperasional']);
    Route::get('/lpmp/laporan',[LPMPController::class, 'laporan']);

    Route::get('/lpmp/dataOperasional/diproses/{id}',[LPMPController::class,'diproses']);
    Route::get('/lpmp/dataOperasional/diterima/{id}',[LPMPController::class,'diterima']);
    Route::get('/lpmp/dataOperasional/komunikasi/{id}',[LPMPController::class,'komunikasi']);
});

// Pengawas
Route::group(['middleware'=>['AuthCheckPengawas']], function(){
    Route::get('/auth/loginPengawas',[AuthController::class, 'loginPengawas']) -> name('auth.loginPengawas');
    Route::get('/pengawas/home',[PengawasController::class, 'home']);
    Route::get('/pengawas/dataMaster',[PengawasController::class, 'dataMaster']);
    Route::get('/pengawas/dataOperasional',[PengawasController::class, 'dataOperasional']);
    Route::get('/pengawas/laporan',[PengawasController::class, 'laporan']);
    
    Route::get('/pengawas/dataOperasional/diproses/{id}',[PengawasController::class,'diproses']);
    Route::get('/pengawas/dataOperasional/diterima/{id}',[PengawasController::class,'diterima']);
    Route::get('/pengawas/dataOperasional/komunikasi/{id}',[PengawasController::class,'komunikasi']);
    
    //komentar
    Route::post('/pengawas/comment',[PengawasController::class,'comment']);
    Route::get('/pengawas/comments/{id}',[PengawasController::class,'comments']);
});

// Tpmps
Route::group(['middleware'=>['AuthCheckTpmps']], function(){
    Route::get('/auth/loginTpmps',    [AuthController::class, 'loginTpmps']) -> name('auth.loginTpmps');
    Route::get('/tpmps/home',[TPMPSController::class, 'home']);
    Route::get('/tpmps/dataOperasional',[TPMPSController::class, 'dataOperasional']);
    Route::get('/tpmps/laporan',[TPMPSController::class, 'laporan']);
    // import excel pemenuhan mutu
    Route::post('/tpmps/dataOperasional/importExcelPemetaanMutu/{id}/{tpmps_id}',[TPMPSController::class, 'importExcelPemetaanMutu']);
    // add forms siklus 1
    Route::post('/tpmps/dataOperasional/tambahMasalah',[MasalahController::class,'tambah']);
    Route::post('/tpmps/dataOperasional/tambahRekomendasi',[RekomendasiController::class,'tambah']);
    Route::post('/tpmps/dataOperasional/tambahAkarMasalah',[AkarMasalahController::class,'tambah']);
    Route::get('/tpmps/dataOperasional/exportTemplate',[TPMPSController::class, 'exportTemplate']);
    Route::post('/tpmps/dataOperasional/KoreksiNilaiRaport',[TPMPSController::class,'koreksiRaportSekolah']);
    Route::get('/tpmps/dataOperasional/ajukan/{id}/{siklus_id}',[TPMPSController::class,'ajukan']);
    // add forms siklus 2
    Route::post('/tpmps/dataOperasional/tambahProgram',[ProgramController::class,'tambah']);
    Route::post('/tpmps/dataOperasional/tambahProgramRekomendasi',[ProgramRekomendasiController::class,'tambah']);
    Route::post('/tpmps/dataOperasional/tambahKegiatan',[KegiatanController::class,'tambah']);
    Route::post('/tpmps/dataOperasional/tambahRencanaKerja',[RencanaKerjaController::class,'tambah']);
    // add forms siklus 3
    Route::post('/tpmps/dataOperasional/tambahRealisasiKerja',[RealisasiKerjaController::class,'tambah']);

    //komentar
    Route::post('/tpmps/comment',[TPMPSController::class,'comment']);
    Route::get('/tpmps/comments',[TPMPSController::class,'comments']);
});

// Check 
Route::post('/auth/check', [AuthController::class, 'check']) -> name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout']) -> name('auth.logout');

Route::post('/auth/checkLpmp', [AuthController::class, 'checkLpmp']) -> name('auth.checkLpmp');
Route::get('/auth/logoutLpmp', [AuthController::class, 'logoutLpmp']) -> name('auth.logoutLpmp');

Route::post('/auth/checkPengawas', [AuthController::class, 'checkPengawas']) -> name('auth.checkPengawas');
Route::get('/auth/logoutPengawas', [AuthController::class, 'logoutPengawas']) -> name('auth.logoutPengawas');

Route::post('/auth/checkTpmps', [AuthController::class, 'checkTpmps']) -> name('auth.checkTpmps');
Route::get('/auth/logoutTpmps', [AuthController::class, 'logoutTpmps']) -> name('auth.logoutTpmps');

