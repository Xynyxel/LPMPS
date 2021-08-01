@extends('tpmps/master')

@section('title', 'Data Operational - TPMPS')
@section('content')

    <!-- Content area -->
    <div class="content container pt-3">

        {{-- cek siklus
			siklus == 1: 
				import Pemetaan Mutu
				koreksi nilai rapot (optional)
			siklus == 2: 
				import Rencana Pemetaan Mutu
			siklus == 3: 
				import Pelaksanaan Pemetaan Mutu
			siklus == 4: 
				import Audit Mutu --}}


        @if (isset($siklus))
            @if ($siklus->siklus == 1)
                <h1>Siklus 1</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            {{-- notifikasi form validasi --}}
                            @if ($errors->has('file'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif

                            {{-- notifikasi sukses --}}
                            @if ($sukses = Session::get('suksesSiklus1'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $sukses }}</strong>
                                </div>
                            @endif

                            <div class="card-header d-flex bd-highlight align-items-center">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <table>
                                        <tr>
                                            <td>
                                                <h1>Pemetaan Mutu</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="/tpmps/dataOperasional/ajukan/{{ $LoggedUserInfo['id'] }}/{{ $siklus->id }}"
                                                    class="btn btn-info {{ $verifikasiPengajuanCek == true ? 'disabled' : '' }}"
                                                    style="width: 100%; margin-bottom:1.3em">
                                                    <i class="fas fa-plus-square">
                                                        <span>
                                                            <b style="font-size: 1.3em">Ajukan</b>
                                                        </span>
                                                    </i>

                                                </a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-success" style="width: 100%">
                                                    <i class="fas fa-file-alt">
                                                        <span>
                                                            <b style="font-size: 1.3em">Lihat Laporan</b>
                                                        </span>
                                                    </i>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <table>
                                    <tr>
                                        <td>
                                            <div class="p-2 bd-highlight">
                                                <a href="/tpmps/dataOperasional/exportTemplate" class="btn btn-info"
                                                    target="_blank">
                                                    <i class="fas fa-file-download">
                                                        <span>Download Template</span>
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-2 bd-highlight">

                                                <button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal"
                                                    data-target="#importExcelStandar"
                                                    {{ $verifikasi == true ? 'disabled' : '' }}>
                                                    <i class="fas fa-file-upload">
                                                        <span>Masukkan Nilai Raport</span></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-2 bd-highlight">
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#koreksiNilaiModal">
                                                    <i class="fas fa-edit">
                                                        <span>Koreksi Nilai Raport</span>
                                                    </i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="p-2 bd-highlight">
                                                <button class="btn btn-primary" style="width: 100%; id=" akarMasalahBtn"
                                                    data-toggle="modal" data-target="#akarMasalahModal">
                                                    <i class="fas fa-plus-square">
                                                        <span>Akar Masalah</span>
                                                    </i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-2 bd-highlight">
                                                <button class="btn btn-primary" style="width: 100%; id=" rekomendasiBtn"
                                                    data-toggle="modal" data-target="#rekomendasiModal">
                                                    <i class="fas fa-plus-square">
                                                        <span>Rekomendasi</span>
                                                    </i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-2 bd-highlight">
                                                <button class="btn btn-primary" id="MasalahBtn" data-toggle="modal"
                                                    data-target="#masalahModal" style="width: 100%">
                                                    <i class="fas fa-plus-square">
                                                        <span>Masalah</span>
                                                    </i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Import Excel -->
                            <div class="modal fade" id="importExcelStandar" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post"
                                        action="/tpmps/dataOperasional/importExcelPemetaanMutu/{{ $LoggedUserInfo['sekolah_id'] }}/{{ $LoggedUserInfo['id'] }}"
                                        enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Pemetaan Mutu </h5>
                                            </div>
                                            <div class="modal-body">

                                                {{ csrf_field() }}

                                                <label>Pilih file excel untuk Pemetaan Mutu</label>
                                                <div class="form-group">
                                                    <input type="file" name="file" required="required">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- Koreksi Nilai Raport --}}
                            <div class="modal fade" id="koreksiNilaiModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Koreksi Nilai Raport</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/tpmps/dataOperasional/KoreksiNilaiRaport" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <select class="custom-select" id="inputGroupSelect01"
                                                        name="sub_indikator_id">
                                                        <option selected>Pilih SubIndikator yang Ingin Dikoreksi</option>
                                                        @foreach ($listSubIndikator as $subIndikator)
                                                            <option value="{{ $subIndikator->id }}">
                                                                {{ $subIndikator->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Nilai</label>
                                                    <input type="number" step='0.01' min="0" value="0" class="form-control"
                                                        name="nilai_koreksi" required />
                                                </div>
                                                <input type="hidden" id="sekolah_id" name="sekolah_id"
                                                    value="{{ $LoggedUserInfo['sekolah_id'] }}">
                                            </div>

                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Modal -->
                {{-- akar masalah --}}
                <div class="modal fade" id="akarMasalahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Akar Masalah</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formManual" action="/tpmps/dataOperasional/tambahAkarMasalah" method="post">
                                @csrf
                                <div class="modal-body">

                                    <!-- Default switch -->
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switchAkarMasalah">
                                        <label id="labelAkarMasalah" class="custom-control-label"
                                            for="switchAkarMasalah">Otomatis</label>
                                    </div>
                                    <br>

                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="deskripsi">
                                            <option selected>Pilih Akar Masalah yang sudah ada...</option>
                                            @foreach ($listAkarMasalahMaster as $akarMasalahMaster)
                                                <option value="{{ $akarMasalahMaster->deskripsi }}">
                                                    {{ $akarMasalahMaster->deskripsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="indikator_id">
                                            <option selected>Pilih Jenis Indikator...</option>
                                            @foreach ($listIndikator as $indikator)
                                                <option value="{{ $indikator->id }}">{{ $indikator->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" id="sekolah_id" name="sekolah_id"
                                        value="{{ $LoggedUserInfo['sekolah_id'] }}">
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                </div>
                            </form>


                            <form id="formOtomatis" action="/tpmps/dataOperasional/tambahAkarMasalah" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switchAkarMasalah">
                                        <label id="labelAkarMasalah" class="custom-control-label"
                                            for="switchAkarMasalah">Manual</label>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                name="deskripsi"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="indikator_id">
                                            <option selected>Pilih Jenis Indikator...</option>
                                            @foreach ($listIndikator as $indikator)
                                                <option value="{{ $indikator->id }}">{{ $indikator->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" id="sekolah_id" name="sekolah_id"
                                        value="{{ $LoggedUserInfo['sekolah_id'] }}">
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- rekomendasi --}}
                <div class="modal fade" id="rekomendasiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Rekomendasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action='/tpmps/dataOperasional/tambahRekomendasi'>
                                @csrf
                                @if (Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="indikator_id" required>
                                            <option selected>Pilih Jenis Indikator...</option>
                                            @foreach ($listIndikator as $indikator)
                                                <option value="{{ $indikator->id }}">{{ $indikator->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" id="sekolah_id" name="sekolah_id"
                                        value="{{ $LoggedUserInfo['sekolah_id'] }}">

                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- masalah --}}
                <div class="modal fade" id="masalahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Masalah</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action='/tpmps/dataOperasional/tambahMasalah'>
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="deskripsi" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="indikator_id" required>
                                            <option selected>Pilih Jenis Indikator...</option>
                                            @foreach ($listIndikator as $indikator)
                                                <option value="{{ $indikator->id }}">{{ $indikator->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" id="sekolah_id" name="sekolah_id"
                                        value="{{ $LoggedUserInfo['sekolah_id'] }}">

                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    var cekAkarMasalah = document.getElementById('switchAkarMasalah');
                    var formManual = document.getElementById('formManual');
                    var formOtomatis = document.getElementById('formOtomatis');

                    formManual.style.display = 'none';
                    formOtomatis.style.display = 'block';
                    cekAkarMasalah.addEventListener('change', (e) => {
                        formManual.style.display = 'none';
                        formOtomatis.style.display = 'none';
                        if (e.target.checked) {
                            formManual.style.display = "block";
                        } else {
                            formOtomatis.style.display = "block";
                        }
                    })
                </script>
            @elseif($siklus->siklus == 2)
                <h1>Siklus 2</h1>
                {{-- standar sekolah
                    rekomendasi berdasarkan indikator
                    tambah program
                    tambah kegiatan
                    tambah Indikatori Kinerja
                    tambah Volume
                    tambah Kebutuhan Biaya
                    tambah Sumber Daya --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header d-flex bd-highlight align-items-center">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <table>
                                        <tr>
                                            <td>
                                                <h1>Rencana Pemetaan Mutu</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="/tpmps/dataOperasional/ajukan/{{ $LoggedUserInfo['id'] }}/{{ $siklus->id }}"
                                                    class="btn btn-info {{ $verifikasiPengajuanCek == true ? 'disabled' : '' }}"
                                                    style="width: 100%; margin-bottom:1.3em">
                                                    <i class="fas fa-plus-square">
                                                        <span>
                                                            <b style="font-size: 1.3em">Ajukan</b>
                                                        </span>
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-success" style="width: 100%">
                                                    <i class="fas fa-file-alt">
                                                        <span>
                                                            <b style="font-size: 1.3em">Lihat Laporan</b>
                                                        </span>
                                                    </i>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <table>
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary" id="programBtn"
                                                style="width: 100%; margin-bottom:1.3em" data-toggle="modal"
                                                data-target="#programModal">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-plus-square">
                                                        <span>Program</span>
                                                    </i>
                                                </div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary" id="kegiatanBtn"
                                                style="width: 100%; margin-bottom:1.3em" data-toggle="modal"
                                                data-target="#kegiatanModal">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-plus-square">
                                                        <span>Kegiatan</span>
                                                    </i>
                                                </div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary" id="rencanaKerjaBtn" data-toggle="modal"
                                                data-target="#rencanaKerjaModal">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-plus-square">
                                                        <span>Rencana Kerja</span>
                                                    </i>
                                                </div>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Import Excel -->
                            <div class="modal fade" id="importExcelStandar" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post"
                                        action="/tpmps/dataOperasional/importExcelPemetaanMutu/{{ $LoggedUserInfo['sekolah_id'] }}/{{ $LoggedUserInfo['id'] }}"
                                        enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Pemetaan Mutu </h5>
                                            </div>
                                            <div class="modal-body">

                                                {{ csrf_field() }}

                                                <label>Pilih file excel untuk Pemetaan Mutu</label>
                                                <div class="form-group">
                                                    <input type="file" name="file" required="required">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- Koreksi Nilai Raport --}}
                            <div class="modal fade" id="koreksiNilaiModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Koreksi Nilai Raport</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/tpmps/dataOperasional/KoreksiNilaiRaport" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <select class="custom-select" id="inputGroupSelect01"
                                                        name="sub_indikator_id">
                                                        <option selected>Pilih SubIndikator yang Ingin Dikoreksi</option>
                                                        @foreach ($listSubIndikator as $subIndikator)
                                                            <option value="{{ $subIndikator->id }}">
                                                                {{ $subIndikator->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Nilai</label>
                                                    <input type="number" step='0.01' min="0" value="0" class="form-control"
                                                        name="nilai_koreksi" required />
                                                </div>
                                                <input type="hidden" id="sekolah_id" name="sekolah_id"
                                                    value="{{ $LoggedUserInfo['sekolah_id'] }}">
                                            </div>

                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- program --}}
                <div class="modal fade" id="programModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Program</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            {{-- form tambah program --}}
                            <form id="formTambahProgram" action='/tpmps/dataOperasional/tambahProgramRekomendasi'
                                method="post">
                                @csrf
                                <div class="modal-body">

                                    <!-- Default switch -->
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switchProgram">
                                        <label id="labelProgram" class="custom-control-label"
                                            for="switchProgram">Otomatis</label>
                                    </div>
                                    <br>

                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="program_id" required>
                                            <option selected value="">Pilih Jenis Program...</option>
                                            @foreach ($listProgram as $program)
                                                <option value="{{ $program->id }}">{{ $program->deskripsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="rekomendasi_id"
                                            required>
                                            <option selected value="">Pilih Rekomendasi...</option>
                                            @foreach ($listRekomendasi as $rekomendasi)
                                                <option value="{{ $rekomendasi->id }}">{{ $rekomendasi->deskripsi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                </div>
                            </form>


                            <form id="formTambahProgramRekomendasi" action='/tpmps/dataOperasional/tambahProgram'
                                method="post">
                                @csrf
                                <div class="modal-body">

                                    <!-- Default switch -->
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switchProgram">
                                        <label id="labelProgram" class="custom-control-label"
                                            for="switchProgram">Manual</label>
                                    </div>
                                    <br>

                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="rekomendasi_id"
                                            required>
                                            <option selected value="">Pilih Rekomendasi...</option>
                                            @foreach ($listRekomendasi as $rekomendasi)
                                                <option value="{{ $rekomendasi->id }}">{{ $rekomendasi->deskripsi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" id="sekolah_id" name="sekolah_id"
                                        value="{{ $LoggedUserInfo['sekolah_id'] }}">
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- kegiatan --}}
                <div class="modal fade" id="kegiatanModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action='/tpmps/dataOperasional/tambahKegiatan'>
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="deskripsi" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="program_id" required>
                                            <option selected value="">Pilih Jenis Program...</option>
                                            @foreach ($listProgram as $program)
                                                <option value="{{ $program->id }}">{{ $program->deskripsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" id="sekolah_id" name="sekolah_id"
                                        value="{{ $LoggedUserInfo['sekolah_id'] }}">

                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- rencana kinerja --}}
                <div class="modal fade" id="rencanaKerjaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Rencana Kerja</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action='/tpmps/dataOperasional/tambahRencanaKerja'>
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Indikator Kinerja</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="indikator_kinerja" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Volume</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="volume" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Biaya</label>
                                        <input type="number" min="0" value="0" class="form-control" id="biaya" name="biaya"
                                            required />
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Sumber Daya</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="sumber_daya" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="kegiatan_id" required>
                                            <option selected value="">Pilih Kegiatan...</option>
                                            @foreach ($listKegiatan as $kegiatan)
                                                <option value="{{ $kegiatan->id }}">{{ $kegiatan->deskripsi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="is_dana_bos" required>
                                            <option selected value="">Apakah menggunakan Dana Bos?</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    var cekProgram = document.getElementById('switchProgram');
                    var formTambahProgram = document.getElementById('formTambahProgram');
                    var formTambahProgramRekomendasi = document.getElementById('formTambahProgramRekomendasi');

                    formTambahProgram.style.display = 'none';
                    formTambahProgramRekomendasi.style.display = 'block';
                    cekProgram.addEventListener('change', (e) => {
                        formTambahProgram.style.display = 'none';
                        formTambahProgramRekomendasi.style.display = 'none';
                        console.log(e.target.checked);
                        if (e.target.checked) {
                            formTambahProgram.style.display = "block";
                        } else {
                            formTambahProgramRekomendasi.style.display = "block";
                        }
                    })
                </script>

            @elseif($siklus->siklus == 3)
                <h1>Siklus 3</h1>
                {{-- standar sekolah
                    rekomendasi
                    program
                    kegiatan
                    tambah penanggung jawab
                    tambah pemangku kepentingan dilibatkan
                    tambah waktu pelaksanaan
                    tambah Bukti Fisik --}}

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex bd-highlight align-items-center">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <table>
                                        <tr>
                                            <td>
                                                <h1>Realisasi Pemetaan Mutu</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="/tpmps/dataOperasional/ajukan/{{ $LoggedUserInfo['id'] }}/{{ $siklus->id }}"
                                                    class="btn btn-info {{ $verifikasiPengajuanCek == true ? 'disabled' : '' }}"
                                                    style="width: 100%; margin-bottom:1.3em">
                                                    <i class="fas fa-plus-square">
                                                        <span>
                                                            <b style="font-size: 1.3em">Ajukan</b>
                                                        </span>
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-success" style="width: 100%">
                                                    <i class="fas fa-file-alt">
                                                        <span>
                                                            <b style="font-size: 1.3em">Lihat Laporan</b>
                                                        </span>
                                                    </i>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <table>
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary" id="programBtn"
                                                style="width: 100%; margin-bottom:1.3em" data-toggle="modal"
                                                data-target="#programModal">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-plus-square">
                                                        <span>Program</span>
                                                    </i>
                                                </div>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-info p-3 mr-3" id="realisasiKinerjaBtn"
                                                style="width: 100%" data-toggle="modal"
                                                data-target="#realisasiKinerjaModal">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fa fa-users"></i>
                                                    <h1 class="m-0">Realisasi Kinerja</h1>
                                                </div>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Import Excel -->
                            <div class="modal fade" id="importExcelStandar" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post"
                                        action="/tpmps/dataOperasional/importExcelPemetaanMutu/{{ $LoggedUserInfo['sekolah_id'] }}/{{ $LoggedUserInfo['id'] }}"
                                        enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Pemetaan Mutu </h5>
                                            </div>
                                            <div class="modal-body">

                                                {{ csrf_field() }}

                                                <label>Pilih file excel untuk Pemetaan Mutu</label>
                                                <div class="form-group">
                                                    <input type="file" name="file" required="required">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- Koreksi Nilai Raport --}}
                            <div class="modal fade" id="koreksiNilaiModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Koreksi Nilai Raport</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/tpmps/dataOperasional/KoreksiNilaiRaport" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <select class="custom-select" id="inputGroupSelect01"
                                                        name="sub_indikator_id">
                                                        <option selected>Pilih SubIndikator yang Ingin Dikoreksi</option>
                                                        @foreach ($listSubIndikator as $subIndikator)
                                                            <option value="{{ $subIndikator->id }}">
                                                                {{ $subIndikator->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Nilai</label>
                                                    <input type="number" step='0.01' min="0" value="0" class="form-control"
                                                        name="nilai_koreksi" required />
                                                </div>
                                                <input type="hidden" id="sekolah_id" name="sekolah_id"
                                                    value="{{ $LoggedUserInfo['sekolah_id'] }}">
                                            </div>

                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- realisasi kinerja --}}
                <div class="modal fade" id="realisasiKinerjaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Realisasi Kerja</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action='/tpmps/dataOperasional/tambahRealisasiKerja'>
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Penanggung Jawab</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="penanggung_jawab" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Pemangku Kepentingan</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="pemangku_kepentingan" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Waktu Pelaksanaan</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="waktu_pelaksanaan" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Bukti Fisik</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="bukti_fisik_keterangan" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Url Bukti Fisik</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="bukti_fisik_url" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="kegiatan_id" required>
                                            <option selected value="">Pilih Kegiatan...</option>
                                            @foreach ($listKegiatan as $kegiatan)
                                                <option value="{{ $kegiatan->id }}">{{ $kegiatan->deskripsi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Tambah"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            @elseif($siklus->siklus == 4)
                <h1>Siklus 4</h1>
                {{-- program
                    kegiatan
                    tambah input
                    tambah proses
                    tambah output
                    tambah outcome --}}
            @endif
        @else
            <h1>Belum ada Siklus yang Berjalan</h1>
        @endif
    </div>

@endsection
