@extends('tpmps/master')

@section('title', 'Data Operational - TPMPS')
@section('content')

    <style>
        #data1 td, #data2 td, #data3 td, #data4 td {
            vertical-align: text-top;
        }
        .modal {
            overflow-y: auto;
        }
        .modal-big {
            min-width: 90vw!important;
        }
        .modal-small{
            width: fit-content!important;
        }
    </style>

    <!-- Content area -->
    <div class="content container pt-3">
        <!-- Modal Loading -->
        <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-small" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border m-5" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Loading -->

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
                                                <Button
                                                    class="btn btn-info {{ $verifikasiPengajuanCek == true ? 'disabled' : '' }}"
                                                    style="width: 100%; margin-bottom:1.3em"
                                                    data-toggle="modal" data-target="#ajukanModal">
                                                    <i class="fas fa-plus-square">
                                                        <span class="m-1">
                                                            <b style="font-size: 1.3em">Ajukan</b>
                                                        </span>
                                                    </i>
                                                </button>
                                            </td>
                                            <!-- Ajukan Modal -->
                                            <div class="modal fade" id="ajukanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ajukan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin? 
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <a href="/tpmps/dataOperasional/ajukan/{{ $LoggedUserInfo['id'] }}/{{ $siklus->id }}" type="button" class="btn btn-primary">Yes</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-success" style="width: 100%" onclick="liatLaporanSiklus('{{ $LoggedUserInfo->sekolah->nama }}',{{$siklus->siklus}})">
                                                    <i class="fas fa-file-alt">
                                                        <span class="m-1">
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
                                                        <span class="m-1">Download Template</span>
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
                                                        <span class="m-1">Masukkan Nilai Raport</span></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-2 bd-highlight">
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#koreksiNilaiModal"
                                                    {{ $verifikasi == false ? 'disabled' : '' }}>
                                                    <i class="fas fa-edit">
                                                        <span class="m-1">Koreksi Nilai Raport</span>
                                                    </i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="p-2 bd-highlight">
                                                <button class="btn btn-primary" id="akarMasalahBtn" style="width: 100%;"
                                                    {{-- data-toggle="modal" data-target="#akarMasalahModal" --}}
                                                    >
                                                    <span>Akar Masalah</span>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-2 bd-highlight">
                                                <button class="btn btn-primary" id="rekomendasiBtn" style="width: 100%;"
                                                    {{-- data-toggle="modal" data-target="#rekomendasiModal" --}}
                                                    >
                                                    <span>Rekomendasi</span>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-2 bd-highlight">
                                                <button class="btn btn-primary" id="masalahBtn" style="width: 100%"
                                                    {{-- data-toggle="modal" data-target="#masalahModal" --}}
                                                    >
                                                    <span>Masalah</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Modal Laporan Sekolah siklus 1 -->
                            <div class="modal fade" id="laporanSekolahSiklus1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-big" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="modal_title_1" class="modal-title">Laporan Sekolah nama sekolah </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="border-top-0">
                                                <table class="table" id="table-raport-sekolah" style="column-width: 10%;"> 
                                                    <thead>
                                                        <tr>
                                                            <th>Standar</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data1">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" data-dismiss="modal">Okay</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Laporan Sekolah siklus 1 -->

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

                {{-- Tabel Akar Masalah --}}
                <div class="row" id="rowAkarMasalah" style="display: none">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="card-title font-weight-semibold">Data Akar Masalah</span>
                                <button onclick="add('akarMasalah')" class="btn btn-primary" data-toggle="modal"
                                    data-target="#akarMasalahModal">Tambah</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive border-top-0">
                                    <table class="table" id="table-akar-masalah">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Sekolah</th>
                                                <th>Indikator</th>
                                                <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($listAkarMasalah->count() > 0)
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($listAkarMasalah as $akarMasalah)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $akarMasalah->tahun }}</td>
                                                        <td>{{ $akarMasalah->deskripsi }}</td>
                                                        <td>{{ $akarMasalah->status }}</td>
                                                        <td>{{ $akarMasalah->datetime }}</td>
                                                        <td>{{ $akarMasalah->sekolah->nama }}</td>
                                                        <td>{{ $akarMasalah->indikator->nama }}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown">
                                                                <a href="#"
                                                                    class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"
                                                                    data-toggle="dropdown">
                                                                    <i class="fa fa-bars"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a onclick="edit('akarMasalah',{{ $akarMasalah->id }})"
                                                                        class="dropdown-item" data-toggle="modal"
                                                                        data-target="#akarMasalahModal">
                                                                        <i class="fa fa-edit"></i>Edit
                                                                    </a>
                                                                    <a href="/tpmps/dataOperasional/hapusAkarMasalah/{{ $akarMasalah->id }}"
                                                                        class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tabel Rekomendasi --}}
                <div class="row" id="rowRekomendasi" style="display: none">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="card-title font-weight-semibold">Data Rekomendasi</span>
                                <button onclick="add('rekomendasi')" class="btn btn-primary" data-toggle="modal"
                                    data-target="#rekomendasiModal">Tambah</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive border-top-0">
                                    <table class="table" id="table-rekomendasi">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Sekolah</th>
                                                <th>Indikator</th>
                                                <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($listRekomendasi->count() > 0)
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($listRekomendasi as $rekomendasi)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $rekomendasi->tahun }}</td>
                                                        <td>{{ $rekomendasi->deskripsi }}</td>
                                                        <td>{{ $rekomendasi->status }}</td>
                                                        <td>{{ $rekomendasi->datetime }}</td>
                                                        <td>{{ $rekomendasi->sekolah->nama }}</td>
                                                        <td>{{ $rekomendasi->indikator->nama }}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown">
                                                                <a href="#"
                                                                    class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"
                                                                    data-toggle="dropdown">
                                                                    <i class="fa fa-bars"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a onclick="edit('rekomendasi',{{ $rekomendasi->id }})"
                                                                        class="dropdown-item" data-toggle="modal"
                                                                        data-target="#rekomendasihModal">
                                                                        <i class="fa fa-edit"></i>Edit
                                                                    </a>
                                                                    <a href="/rekomendasi/hapus/{{ $rekomendasi->id }}"
                                                                        class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tabel Masalah --}}
                <div class="row" id="rowMasalah" style="display: none">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="card-title font-weight-semibold">Data Masalah</span>
                                <button onclick="add('masalah')" class="btn btn-primary" data-toggle="modal"
                                    data-target="#masalahModal">Tambah</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive border-top-0">
                                    <table class="table" id="table-masalah">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Sekolah</th>
                                                <th>Indikator</th>
                                                <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($listMasalah->count() > 0)
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($listMasalah as $masalah)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $masalah->tahun }}</td>
                                                        <td>{{ $masalah->deskripsi }}</td>
                                                        <td>{{ $masalah->status }}</td>
                                                        <td>{{ $masalah->datetime }}</td>
                                                        <td>{{ $masalah->sekolah->nama }}</td>
                                                        <td>{{ $masalah->indikator->nama }}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown">
                                                                <a href="#"
                                                                    class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"
                                                                    data-toggle="dropdown">
                                                                    <i class="fa fa-bars"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a onclick="edit('masalah',{{ $masalah->id }})"
                                                                        class="dropdown-item" data-toggle="modal"
                                                                        data-target="#masalahhModal">
                                                                        <i class="fa fa-edit"></i>Edit
                                                                    </a>
                                                                    <a href="/masalah/hapus/{{ $masalah->id }}"
                                                                        class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
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
                                <h5 class="modal-title" id="title-modal-akar-masalah">Tambah Akar Masalah</h5>
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

                            <form id="formEdit" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                                            <textarea class="form-control" id="akar-masalah-deskripsi" rows="3"
                                                name="deskripsi"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="custom-select" id="akar-masalah-indikator" name="indikator_id">
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
                                    <input type="submit" class="btn btn-primary" value="Ubah"></button>
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
                    var formEdit = document.getElementById('formEdit');

                    formManual.style.display = 'none';
                    formOtomatis.style.display = 'block';
                    formEdit.style.display = 'none';
                    cekAkarMasalah.addEventListener('change', (e) => {
                        formManual.style.display = 'none';
                        formEdit.style.display = 'none';
                        formOtomatis.style.display = 'none';
                        if (e.target.checked) {
                            formManual.style.display = "block";
                        } else {
                            formOtomatis.style.display = "block";
                        }
                    })
                    const table = ['table-akar_masalah','table-masalah','table-rekomendasi']
                    const row = ['rowAkarMasalah', 'rowMasalah','rowRekomendasi']

                    const akarMasalahBtn = document.getElementById('akarMasalahBtn');
                    const masalahBtn = document.getElementById('masalahBtn');
                    const rekomendasiBtn = document.getElementById('rekomendasiBtn');

                    window.addEventListener("DOMContentLoaded", () => {
                        closeAll();
                        akarMasalahBtn.addEventListener('click', () => {
                            blockID('rowAkarMasalah');
                        })
                        masalahBtn.addEventListener('click', () => {
                            blockID('rowMasalah');
                        })
                        rekomendasiBtn.addEventListener('click', () => {
                            blockID('rowRekomendasi');
                        })
                    })

                    const edit = (table, id) => {
                        if(table == "akarMasalah") {
                            const title = document.getElementById('title-modal-akar-masalah');
                            const deskripsi = document.getElementById('akar-masalah-deskripsi');
                            const indikator = document.getElementById('akar-masalah-indikator');
                            fetch(`${url}/tpmps/dataOperasional/editAkarMasalah/${id}`)
                                .then(response=>response.json())
                                .then(data=>{
                                    formManual.style.display = 'none';
                                    formOtomatis.style.display = 'none';
                                    formEdit.style.display = 'block';
                                    formEdit.action=`/tpmps/dataOperasional/ubahAkarMasalah/${id}`
                                    title.innerText = "Edit Akar Masalah";
                                    deskripsi.innerText = data.deskripsi;
                                    indikator.value = data.indikator_id;
                                })
                        }
                        else if(table == "raportKPI") {
                            const form = document.getElementById('form_raport_kpi');
                            const title = document.getElementById('title_form_raport_kpi');
                            const tahun = document.getElementById('raport_kpi_tahun');
                            const nilai_kpi = document.getElementById('raport_kpi_nilai_kpi');
                            const kota_kabupaten_id = document.getElementById('raport_kpi_kota_kabupaten_id');
                            const sub_indikator_id = document.getElementById('raport_kpi_sub_indikator_id');
                            const btn = document.getElementById('btn_raport_kpi');
                            fetch(`${url}/raportKPI/edit/${id}`)
                                .then(response=>response.json())
                                .then(data=>{
                                    form.action = `/raportKPI/ubah/${id}`;
                                    title.innerText = "Edit Raport KPI";
                                    tahun.value = data.tahun;
                                    nilai_kpi.value = data.nilai_kpi;
                                    kota_kabupaten_id.value = data.kota_kabupaten_id;
                                    sub_indikator_id.value = data.sub_indikator_id;
                                    btn.value = "Edit";
                                })
                        }
                    }
                    const add = (table) => {
                        if(table == "sekolahPengawas") {
                            const form = document.getElementById('form_sekolah_pengawas');
                            const title = document.getElementById('title_form_sekolah_pengawas');
                            const tgl_sk = document.getElementById('sekolah_pengawas_tgl_sk');
                            const no_sk = document.getElementById('sekolah_pengawas_no_sk');
                            const sekolah_id = document.getElementById('sekolah_pengawas_sekolah_id');
                            const pengawas_id = document.getElementById('sekolah_pengawas_pengawas_id');
                            const btn = document.getElementById('btn_sekolah_pengawas');

                            form.action = "/sekolahPengawas/tambah";
                            title.innerText = "Tambah Sekolah - Pengawas";
                            tgl_sk.value = "";
                            no_sk.value = "";
                            sekolah_id.value = "";
                            pengawas_id.value = "";
                            btn.value = "Tambah";
                        }
                        else if(table == "raportKPI") {
                            const form = document.getElementById('form_raport_kpi');
                            const title = document.getElementById('title_form_raport_kpi');
                            const tahun = document.getElementById('raport_kpi_tahun');
                            const nilai_kpi = document.getElementById('raport_kpi_nilai_kpi');
                            const kota_kabupaten_id = document.getElementById('raport_kpi_kota_kabupaten_id');
                            const sub_indikator_id = document.getElementById('raport_kpi_sub_indikator_id');
                            const btn = document.getElementById('btn_raport_kpi');
                            fetch(`${url}/raportKPI/edit/${id}`)
                                .then(response=>response.json())
                                .then(data=>{
                                    form.action = `/raportKPI/tambah`;
                                    title.innerText = "Tambah Raport KPI";
                                    tahun.value = "";
                                    nilai_kpi.value = "";
                                    kota_kabupaten_id.value = "";
                                    sub_indikator_id.value = "";
                                    btn.value = "Tambah";
                                })
                        }
                    }
                    
                    const blockID = (id) => {
                        closeAll();
                        document.getElementById(id).style.display = "block"
                    }

                    const closeAll = () => {
                        row.forEach(id => {
                            document.getElementById(id).style.display = "none"
                        })
                    }
                    $(document).ready(function() {
                        table.forEach(id => {
                            $(`#${id}`).DataTable();
                        });
                    });
                </script>
            @elseif($siklus->siklus == 2)
                <h1>Siklus 2</h1>
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
                                                <Button
                                                    class="btn btn-info {{ $verifikasiPengajuanCek == true ? 'disabled' : '' }}"
                                                    style="width: 100%; margin-bottom:1.3em"
                                                    data-toggle="modal" data-target="#ajukanModal">
                                                    <i class="fas fa-plus-square">
                                                        <span class="m-1">
                                                            <b style="font-size: 1.3em">Ajukan</b>
                                                        </span>
                                                    </i>
                                                </button>
                                            </td>
                                            {{--  --}}
                                            <!-- Ajukan Modal -->
                                            <div class="modal fade" id="ajukanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ajukan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin? 
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <a href="/tpmps/dataOperasional/ajukan/{{ $LoggedUserInfo['id'] }}/{{ $siklus->id }}" type="button" class="btn btn-primary">Yes</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-success" style="width: 100%" onclick="liatLaporanSiklus('{{ $LoggedUserInfo->sekolah->nama }}',{{$siklus->siklus}})">
                                                    <i class="fas fa-file-alt">
                                                        <span class="m-1">
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
                                                    <span class="m-1">Program</span>
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
                                                    <span class="m-1">Kegiatan</span>
                                                </div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary" id="rencanaKerjaBtn" data-toggle="modal"
                                                data-target="#rencanaKerjaModal">
                                                <div class="d-flex flex-column align-items-center">
                                                    <span class="m-1">Rencana Kerja</span>
                                                </div>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Laporan Sekolah siklus 2 -->
                <div class="modal fade" id="laporanSekolahSiklus2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-big" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="modal_title_2" class="modal-title">Laporan Sekolah nama sekolah </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="border-top-0">
                                    <table class="table" id="table-raport-sekolah">
                                        <thead>
                                            <tr>
                                                <th>Standar</th>
                                                <th>Rekomendasi</th>
                                                <th>Program</th>
                                                <th>Kegiatan</th>
                                                <th>Indikator Kinerja</th>
                                                <th>Volume</th>
                                                <th>Kebutuhan Biaya</th>
                                                <th>Sumber Daya</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data2">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal">Okay</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Laporan Sekolah siklus 2 -->

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
                                            <Button
                                                    class="btn btn-info {{ $verifikasiPengajuanCek == true ? 'disabled' : '' }}"
                                                    style="width: 100%; margin-bottom:1.3em"
                                                    data-toggle="modal" data-target="#ajukanModal">
                                                    <i class="fas fa-plus-square">
                                                        <span class="m-1">
                                                            <b style="font-size: 1.3em">Ajukan</b>
                                                        </span>
                                                    </i>
                                                </button>
                                            </td>
                                            {{--  --}}
                                            <!-- Ajukan Modal -->
                                            <div class="modal fade" id="ajukanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ajukan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin? 
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <a href="/tpmps/dataOperasional/ajukan/{{ $LoggedUserInfo['id'] }}/{{ $siklus->id }}" type="button" class="btn btn-primary">Yes</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-success" style="width: 100%" onclick="liatLaporanSiklus('{{ $LoggedUserInfo->sekolah->nama }}',{{$siklus->siklus}})">
                                                    <i class="fas fa-file-alt">
                                                        <span class="m-1">
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
                                            <button class="btn btn-primary" id="realisasiKinerjaBtn" style="width: 100%"
                                                data-toggle="modal" data-target="#realisasiKinerjaModal">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-plus-square">
                                                        <span class="m-1">Realisasi Kinerja</span>
                                                    </i>
                                                </div>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Laporan Sekolah siklus 3 -->
                <div class="modal fade" id="laporanSekolahSiklus3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-big" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="modal_title_3" class="modal-title">Laporan Sekolah nama sekolah </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="border-top-0">
                                    <table class="table" id="table-raport-sekolah">
                                        <thead>
                                            <tr>
                                                <th>Standar</th>
                                                <th>Rekomendasi</th>
                                                <th>Program</th>
                                                <th>Kegiatan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Pemangku Kepentingan yang Dilibatkan</th>
                                                <th>Waktu Pelaksanaan</th>
                                                <th>Bukti Fisik</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data3">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal">Okay</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Laporan Sekolah siklus 3 -->

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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header d-flex bd-highlight align-items-center">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <table>
                                        <tr>
                                            <td>
                                                <h1>Audit Mutu</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <Button
                                                    class="btn btn-info {{ $verifikasiPengajuanCek == true ? 'disabled' : '' }}"
                                                    style="width: 100%; margin-bottom:1.3em"
                                                    data-toggle="modal" data-target="#ajukanModal">
                                                    <i class="fas fa-plus-square">
                                                        <span class="m-1">
                                                            <b style="font-size: 1.3em">Ajukan</b>
                                                        </span>
                                                    </i>
                                                </button>
                                            </td>
                                            {{--  --}}
                                            <!-- Ajukan Modal -->
                                            <div class="modal fade" id="ajukanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ajukan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin? 
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <a href="/tpmps/dataOperasional/ajukan/{{ $LoggedUserInfo['id'] }}/{{ $siklus->id }}" type="button" class="btn btn-primary">Yes</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-success" style="width: 100%" onclick="liatLaporanSiklus('{{ $LoggedUserInfo->sekolah->nama }}',{{$siklus->siklus}})">
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
                                {{-- <table>
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary" id="realisasiKinerjaBtn" style="width: 100%"
                                                data-toggle="modal" data-target="#realisasiKinerjaModal">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-plus-square">
                                                        <span>Realisasi Kinerja</span>
                                                    </i>
                                                </div>
                                            </button>
                                        </td>
                                    </tr>
                                </table> --}}
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal Laporan Sekolah siklus 4 -->
                <div class="modal fade" id="laporanSekolahSiklus4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="modal_title_4" class="modal-title">Laporan Sekolah nama sekolah </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive border-top-0">
                                    <table class="table text-nowrap" id="table-raport-sekolah">
                                        <thead>
                                            <tr>
                                                <th>Program</th>
                                                <th>Kegiatan</th>
                                                <th>Input</th>
                                                <th>Proses</th>
                                                <th>Output</th>
                                                <th>Outcome</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data4">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal">Okay</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Laporan Sekolah siklus 4 -->
            @endif
        @else
            <h1>Belum ada Siklus yang Berjalan</h1>
        @endif
    </div>
    <script>
        const id = "{{ $LoggedUserInfo['sekolah_id'] }}"
    
        const getData = async (url) => {
            const response = await fetch(url);
            const data = response.json();
            return new Promise(resolve => {
                resolve(data);
            })
        }
    
        const liatLaporanSiklus = async (namaSekolah, siklus) => {
            var laporanSekolahModal = new bootstrap.Modal(document.getElementById(`laporanSekolahSiklus${siklus}`), {
                keyboard: false
            })
            var loadingModal = new bootstrap.Modal(document.getElementById('loading'), {
                keyboard: false
            })
    
            if(siklus == 1){
                loadingModal.show();
                const data = document.getElementById("data1");
    
                const dataStandar = await getData(`${url}/standar`);
                const dataIndikator = await Promise.all(dataStandar.map(async standar=>await getData(`${url}/indikator/${standar.id}`)));
                const dataSubIndikator = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/subIndikator/${indikator.id}/${id}`)))));
                const dataKekuatan = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/kekuatan/${indikator.id}/${id}`)))));
                const dataKelemahan = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/kelemahan/${indikator.id}/${id}`)))));
                const dataMasalah = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/masalah/${indikator.id}`)))));
                const dataAkarMasalah = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/akarMasalah/${indikator.id}`)))));
                const dataRekomendasi = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/rekomendasi/indikator/${indikator.id}`)))));
    
                const allData = [];
                for(let i = 0; i < dataStandar.length; i++) {
                    allData.push({
                        "standar": dataStandar[i],
                        "indikator": []
                    });
                    for(let j = 0; j < dataIndikator[i].length; j++) {
                        allData[i].indikator.push(dataIndikator[i][j]);
                        for(let k = 0; k < dataSubIndikator[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].subIndikator = [dataSubIndikator[i][j][k]];
                            }
                            else {
                                allData[i].indikator[j].subIndikator.push(dataSubIndikator[i][j][k]);
                            }
                        }
                        for(let k = 0; k < dataKekuatan[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].kekuatan = [dataKekuatan[i][j][k]];
                            }
                            else {
                                allData[i].indikator[j].kekuatan.push(dataKekuatan[i][j][k]);
                            }
                        }
                        for(let k = 0; k < dataKelemahan[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].kelemahan = [dataKelemahan[i][j][k]];
                            }
                            else {
                                allData[i].indikator[j].kelemahan.push(dataKelemahan[i][j][k]);
                            }
                        }
                        for(let k = 0; k < dataMasalah[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].masalah = [dataMasalah[i][j][k]];
                            }
                            else {
                                allData[i].indikator[j].masalah.push(dataMasalah[i][j][k]);
                            }
                        }
                        for(let k = 0; k < dataAkarMasalah[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].akarMasalah = [dataAkarMasalah[i][j][k]];
                            }
                            else {
                                allData[i].indikator[j].akarMasalah.push(dataAkarMasalah[i][j][k]);
                            }
                        }
                        for(let k = 0; k < dataRekomendasi[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].rekomendasi = [dataRekomendasi[i][j][k]]
                            }
                            else {
                                allData[i].indikator[j].rekomendasi.push(dataRekomendasi[i][j][k]);
                            }
                        }
                    }
                }
    
                data.innerHTML = ""
                if(allData.length > 0) {
                    let count = 0;
                    allData.forEach((el,idx)=>{
                        data.innerHTML +=`
                            <tr>
                                <td>${el.standar.nomor}. ${el.standar.nama}</td>
                                <td colspan="7">
                                    <table class="otherTable">
                                        <thead>
                                            <tr>
                                                <th>Indikator</th>
                                                <th>SubIndikator</th>
                                                <th>Kekuatan</th>
                                                <th>Kelemahan</th>
                                                <th>Masalah</th>
                                                <th>Akar Masalah</th>
                                                <th>Rekomendasi</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </td>
                            </tr>
                        `;
                        el.indikator.forEach(el2 => {
                            const otherTableClass = document.getElementsByClassName('otherTable')[idx]
    
                            otherTableClass.innerHTML += `
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="mr-1">${el2.nomor}.</div>
                                            <div>${el2.nama} (${el2.nilai.toFixed(2)})</div>
                                        </div>
                                    </td>
                                    <td class="subIndikator"></td>
                                    <td class="kekuatan"></td>
                                    <td class="kelemahan"></td>
                                    <td class="masalah"></td>
                                    <td class="akarMasalah"></td>
                                    <td class="rekomendasi"></td>
                                </tr>
                            `
                            
                            const SubIndikatorClass = document.getElementsByClassName('subIndikator')[count]
                            const kekuatanClass = document.getElementsByClassName('kekuatan')[count]
                            const kelemahanClass = document.getElementsByClassName('kelemahan')[count]
                            const masalahClass = document.getElementsByClassName('masalah')[count]
                            const akarMasalahClass = document.getElementsByClassName('akarMasalah')[count]
                            const rekomendasiClass = document.getElementsByClassName('rekomendasi')[count]
    
                            if(el2.hasOwnProperty("subIndikator")) {
                                el2.subIndikator.forEach(subIndikator => {
                                    SubIndikatorClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">${subIndikator.nomor}.</div>
                                            <div>${subIndikator.nama} (${subIndikator.nilai})</div>
                                        </div>
                                    `;
                                });
                            }
    
                            if(el2.hasOwnProperty("kekuatan")) {
                                el2.kekuatan.forEach(kekuatan => {
                                    kekuatanClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">${kekuatan.nomor}.</div>
                                            <div>${kekuatan.nama} (${kekuatan.nilai})</div>
                                        </div>
                                    `;
                                });
                            }
    
                            if(el2.hasOwnProperty("kelemahan")) {
                                el2.kelemahan.forEach(kelemahan => {
                                    kelemahanClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">${kelemahan.nomor}.</div>
                                            <div>${kelemahan.nama} (${kelemahan.nilai})</div>
                                        </div>
                                    `;
                                });
                            }
    
                            if(el2.hasOwnProperty("masalah")) {
                                el2.masalah.forEach(masalah => {
                                    masalahClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">-</div>
                                            <div>${masalah.deskripsi}</div>
                                        </div>
                                        `;
                                });
                            }
                            
                            if(el2.hasOwnProperty("akarMasalah")) {
                                el2.akarMasalah.forEach(akarMasalah => {
                                    akarMasalahClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">-</div>
                                            <div>${akarMasalah.deskripsi}</div>
                                        </div>
                                        `;
                                });
                            }
                            
                            if(el2.hasOwnProperty("rekomendasi")) {
                                el2.rekomendasi.forEach(rekomendasi => {
                                    rekomendasiClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">-</div>
                                            <div>${rekomendasi.deskripsi}</div>
                                        </div>
                                        `;
                                });
                            }
                            count++;
                        });
                    })
                }
                else {
                    data.innerHTML +=`
                        <tr>
                            <td colspan="8">Tidak ada pemetaan mutu</td>
                        </tr>
                    `;
                }
                document.getElementById("modal_title_1").innerHTML = `Laporan <b>Pemetaan mutu</b> Sekolah ${namaSekolah}`;
                loadingModal.hide();
                laporanSekolahModal.show();
            } 
            else if(siklus == 2){
                loadingModal.show();
                const data = document.getElementById("data2");
    
                const dataStandar = await getData(`${url}/standar`);
                const dataRekomendasi = await Promise.all(dataStandar.map(async standar=>await getData(`${url}/rekomendasi/standar/${standar.id}/${id}`)));
                const dataProgram = await Promise.all(dataRekomendasi.map(async data=>await Promise.all(data.map(async rekomendasi=>await getData(`${url}/program/${rekomendasi.id}`)))));
                const dataKegiatan = await Promise.all(dataProgram.map(async data1=>await Promise.all(data1.map(async data2=>await Promise.all(data2.map(async program=>await getData(`${url}/kegiatan/${program.id}`)))))));
                const dataRencana = await Promise.all(dataKegiatan.map(async data1=>await Promise.all(data1.map(async data2=>await Promise.all(data2.map(async data3=>await Promise.all(data3.map(async kegiatan=>await getData(`${url}/rencanaKerja/${kegiatan.id}`)))))))));
                const allData = []
                for(let i = 0; i < dataStandar.length; i++) {
                    allData.push({
                        "standar": dataStandar[i]
                    });
                    for(let j = 0; j < dataRekomendasi[i].length; j++) {
                        if (j == 0) {
                            allData[i].rekomendasi = [dataRekomendasi[i][j]];
                        }
                        else {
                            let check = true;
                            for(let k = 0; k < allData[i].rekomendasi.length; k++) {
                                if (allData[i].rekomendasi[k] == dataRekomendasi[i][j].deskripsi) {
                                    check = false;
                                    break;
                                }
                            }
                            if (check) {
                                allData[i].rekomendasi.push(dataRekomendasi[i][j]);
                            }
                        }
    
                        for(let k = 0; k < dataProgram[i][j].length; k++) {
                            if (k == 0) {
                                allData[i].program = [dataProgram[i][j][k]];
                            }
                            else {
                                let check = true;
                                for(let l = 0; l < allData[idx].program.length; l++) {
                                    if (allData[i].program[l] == dataProgram[i][j][k].deskripsi) {
                                        check = false;
                                        break;
                                    }
                                }
                                if (check) {
                                    allData[i].program.push(dataProgram[i][j][k]);
                                }
                            }
    
                            for(let l = 0; l < dataKegiatan[i][j][k].length; l++) {
                                if (l == 0) {
                                    allData[i].kegiatan = [dataKegiatan[i][j][k][l]];
                                }
                                else {
                                    let check = true;
                                    for(let m = 0; m < allData[i].kegiatan.length; m++) {
                                        if (allData[i].kegiatan[l] == dataKegiatan[i][j][k][l].deskripsi) {
                                            check = false;
                                            break;
                                        }
                                    }
                                    if (check) {
                                        allData[i].kegiatan.push(dataKegiatan[i][j][k][l]);
                                    }
                                }
    
                                for(let m = 0; m < dataRencana[i][j][k][l].length; m++) {
                                    if (m == 0) {
                                        allData[i].rencana = [dataRencana[i][j][k][l][m]];
                                    }
                                    else {
                                        let check = true;
                                        for(let n = 0; n < allData[i].rencana.length; n++) {
                                            if (allData[i].rencana[l] == dataRencana[i][j][k][l][m].rencana) {
                                                check = false;
                                                break;
                                            }
                                        }
                                        if (check) {
                                            allData[i].rencana.push(dataRencana[i][j][k][l][m]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                
                data.innerHTML = ""
                if(allData.length > 0) {
                    allData.forEach((el,idx) => {
                        data.innerHTML +=`
                            <tr>
                                <td>${el.standar.nomor}. ${el.standar.nama}</td>
                                <td class="rekomendasi2"></td>
                                <td class="program"></td>
                                <td class="kegiatan"></td>
                                <td class="indikatorKinerja"></td>
                                <td class="volume"></td>
                                <td class="kebutuhanBiaya"></td>
                                <td class="sumberDaya"></td>
                            </tr>
                        `;
                        const rekomendasiClass = document.getElementsByClassName('rekomendasi2')[idx];
                        const programClass = document.getElementsByClassName('program')[idx];
                        const kegiatanClass = document.getElementsByClassName('kegiatan')[idx];
                        const indikatorKinerjaClass = document.getElementsByClassName('indikatorKinerja')[idx]
                        const volumeClass = document.getElementsByClassName('volume')[idx]
                        const kebutuhanBiayaClass = document.getElementsByClassName('kebutuhanBiaya')[idx]
                        const sumberDayaClass = document.getElementsByClassName('sumberDaya')[idx]
                        
                        if(el.hasOwnProperty('rekomendasi')) {
                            el.rekomendasi.forEach(rekomendasi=>{
                                rekomendasiClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${rekomendasi.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('program')) {
                            el.program.forEach(program=>{
                                programClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${program.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('kegiatan')) {
                            el.kegiatan.forEach(kegiatan=>{
                                kegiatanClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${kegiatan.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('rencana')) {
                            el.rencana.forEach(rencana=>{
                                indikatorKinerjaClass.innerHTML += `${rencana.indikator_kinerja}<br/><br/>`;
                                volumeClass.innerHTML += `${rencana.volume}<br/><br/>`;
                                kebutuhanBiayaClass.innerHTML += `${rencana.biaya}<br/><br/>`;
                                sumberDayaClass.innerHTML += `${rencana.is_dana_bos == 1 ? "Dana Bos" : ""}<br/>${rencana.sumber_daya}<br/><br/>`;
                            })
                        }
                    });
                }
                else {
                    data.innerHTML +=`
                        <tr>
                            <td colspan="8">Tidak ada rencana pemetaan mutu</td>
                        </tr>
                    `;
                }
                document.getElementById("modal_title_2").innerHTML = `Laporan <b>Rencana Pemetaan mutu</b> Sekolah ${namaSekolah}`;
                loadingModal.hide();
                laporanSekolahModal.show();
            }
            else if(siklus == 3){
                loadingModal.show();
                const data = document.getElementById("data3");
    
                const dataStandar = await getData(`${url}/standar`);
                const dataRekomendasi = await Promise.all(dataStandar.map(async standar=>await getData(`${url}/rekomendasi/standar/${standar.id}/${id}`)));
                const dataProgram = await Promise.all(dataRekomendasi.map(async data=>await Promise.all(data.map(async rekomendasi=>await getData(`${url}/program/${rekomendasi.id}`)))));
                const dataKegiatan = await Promise.all(dataProgram.map(async data1=>await Promise.all(data1.map(async data2=>await Promise.all(data2.map(async program=>await getData(`${url}/kegiatan/${program.id}`)))))));
                const dataRealisasi = await Promise.all(dataKegiatan.map(async data1=>await Promise.all(data1.map(async data2=>await Promise.all(data2.map(async data3=>await Promise.all(data3.map(async kegiatan=>await getData(`${url}/realisasiKerja/${kegiatan.id}`)))))))));
                const allData = []
                for(let i = 0; i < dataStandar.length; i++) {
                    allData.push({
                        "standar": dataStandar[i]
                    });
                    for(let j = 0; j < dataRekomendasi[i].length; j++) {
                        if (j == 0) {
                            allData[i].rekomendasi = [dataRekomendasi[i][j]];
                        }
                        else {
                            let check = true;
                            for(let k = 0; k < allData[i].rekomendasi.length; k++) {
                                if (allData[i].rekomendasi[k] == dataRekomendasi[i][j].deskripsi) {
                                    check = false;
                                    break;
                                }
                            }
                            if (check) {
                                allData[i].rekomendasi.push(dataRekomendasi[i][j]);
                            }
                        }
    
                        for(let k = 0; k < dataProgram[i][j].length; k++) {
                            if (k == 0) {
                                allData[i].program = [dataProgram[i][j][k]];
                            }
                            else {
                                let check = true;
                                for(let l = 0; l < allData[idx].program.length; l++) {
                                    if (allData[i].program[l] == dataProgram[i][j][k].deskripsi) {
                                        check = false;
                                        break;
                                    }
                                }
                                if (check) {
                                    allData[i].program.push(dataProgram[i][j][k]);
                                }
                            }
    
                            for(let l = 0; l < dataKegiatan[i][j][k].length; l++) {
                                if (l == 0) {
                                    allData[i].kegiatan = [dataKegiatan[i][j][k][l]];
                                }
                                else {
                                    let check = true;
                                    for(let m = 0; m < allData[i].kegiatan.length; m++) {
                                        if (allData[i].kegiatan[l] == dataKegiatan[i][j][k][l].deskripsi) {
                                            check = false;
                                            break;
                                        }
                                    }
                                    if (check) {
                                        allData[i].kegiatan.push(dataKegiatan[i][j][k][l]);
                                    }
                                }
    
                                for(let m = 0; m < dataRealisasi[i][j][k][l].length; m++) {
                                    if (m == 0) {
                                        allData[i].realisasi = [dataRealisasi[i][j][k][l][m]];
                                    }
                                    else {
                                        let check = true;
                                        for(let n = 0; n < allData[i].rencana.length; n++) {
                                            if (allData[i].realisasi[l] == dataRealisasi[i][j][k][l][m].rencana) {
                                                check = false;
                                                break;
                                            }
                                        }
                                        if (check) {
                                            allData[i].rencana.push(dataRealisasi[i][j][k][l][m]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                
                data.innerHTML = ""
                if(allData.length > 0) {
                    allData.forEach((el,idx) => {
                        data.innerHTML +=`
                            <tr>
                                <td>${el.standar.nomor}. ${el.standar.nama}</td>
                                <td class="rekomendasi3"></td>
                                <td class="program3"></td>
                                <td class="kegiatan3"></td>
                                <td class="penanggungJawab"></td>
                                <td class="pemangku"></td>
                                <td class="waktuPelaksanaan"></td>
                                <td class="buktiFisik"></td>
                            </tr>
                        `;
                        const rekomendasiClass = document.getElementsByClassName('rekomendasi3')[idx];
                        const programClass = document.getElementsByClassName('program3')[idx];
                        const kegiatanClass = document.getElementsByClassName('kegiatan3')[idx];
                        const penanggungJawabClass = document.getElementsByClassName('penanggungJawab')[idx]
                        const pemangkuClass = document.getElementsByClassName('pemangku')[idx]
                        const waktuPelaksanaanClass = document.getElementsByClassName('waktuPelaksanaan')[idx]
                        const buktiFisikClass = document.getElementsByClassName('buktiFisik')[idx]
                        
                        if(el.hasOwnProperty('rekomendasi')) {
                            el.rekomendasi.forEach(rekomendasi=>{
                                rekomendasiClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${rekomendasi.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('program')) {
                            el.program.forEach(program=>{
                                programClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${program.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('kegiatan')) {
                            el.kegiatan.forEach(kegiatan=>{
                                kegiatanClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${kegiatan.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('realisasi')) {
                            el.realisasi.forEach(realisasi=>{
                                penanggungJawabClass.innerHTML += `${realisasi.penanggung_jawab}<br/><br/>`;
                                pemangkuClass.innerHTML += `${realisasi.pemangku_kepentingan}<br/><br/>`;
                                waktuPelaksanaanClass.innerHTML += `${realisasi.waktu_pelaksanaan}<br/><br/>`;
                                buktiFisikClass.innerHTML += `${realisasi.bukti_fisik_keterangan}<br/><br/>`;
                            })
                        }
                    });
                }
                else {
                    data.innerHTML +=`
                        <tr>
                            <td colspan="8">Tidak ada pelaksanaan pemetaan mutu</td>
                        </tr>
                    `;
                }
                document.getElementById("modal_title_3").innerHTML = `Laporan <b>Pelaksanaan Pemetaan mutu</b> Sekolah ${namaSekolah} `;
                loadingModal.hide();
                laporanSekolahModal.show();
            }
            else if(siklus == 4){
                document.getElementById("modal_title_4").innerHTML = `Laporan <b>Audit mutu</b> Sekolah ${namaSekolah} `;
                laporanSekolahModal.show();
            }
        }
    </script>
@endsection
