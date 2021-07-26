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

        @php
            $sikluss = 1;
        @endphp
        @if ($sikluss == 1)
            <h1>Siklus 1</h1>
            {{-- Tabel Standar --}}
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

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="card-title font-weight-semibold">Pemetaan Mutu</span>
                            <button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal"
                                data-target="#importExcelStandar">IMPORT EXCEL</button>
                        </div>
                        <!-- Import Excel -->
                        <div class="modal fade" id="importExcelStandar" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post"
                                    action="/tpmps/dataOperasional/importExcelPemetaanMutu/{{ $LoggedUserInfo['sekolah_id'] }}"
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
                        <!-- Table -->
                        <div class="card-body">
                            <div class="table-responsive border-top-0">
                                <table class="table text-nowrap" id="table-sekolah">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>tahun</th>
                                            <th>nomor</th>
                                            <th>nama</th>
                                            <th>status</th>
                                            <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr align="center">
                                            <td colspan="6">Belum ada Laporan Pemetaan Mutu</td>
                                        </tr>
                                    </tbody>
                                    {{-- <thead>
										<tr>
											<th>No</th>
											<th>tahun</th>
											<th>nomor</th>
											<th>nama</th>
											<th>status</th>
											<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
										</tr>
									</thead>
									<tbody>
										@if ($standar->count() > 0)
											@php $i=1 @endphp
											@foreach ($standar as $s)
												<tr>
													<td>{{ $i++ }}</td>
													<td>{{ $s->tahun }}</td>
													<td>{{ $s->nomor }}</td>
													<td>{{ $s->nama }}</td>
													<td><span
															class="badge badge-success-100 text-success">{{ $s->status }}</span>
													</td>
												</tr>
											@endforeach
										@else
											<tr align="center">
												<td colspan="6">Belum ada Laporan Pemetaan Mutu</td>
											</tr>
										@endif
									</tbody> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <button class="btn btn-info p-3 mr-3" id="akarMasalahBtn" style="width: 100%" data-toggle="modal"
                        data-target="#akarMasalahModal">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fa fa-users"></i>
                            <h1 class="m-0">Akar Masalah</h1>
                        </div>
                    </button>
                </div>
                <div class="col-4">
                    <button class="btn btn-success p-3 mr-3" id="rekomendasiBtn" style="width: 100%" data-toggle="modal"
                        data-target="#rekomendasiModal">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fa fa-school"></i>
                            <h1 class="m-0">Rekomendasi</h1>
                        </div>
                    </button>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary p-3 mr-3" id="MasalahBtn" style="width: 100%" data-toggle="modal"
                        data-target="#masalahModal">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fa fa-city"></i>
                            <h1 class="m-0">Masalah</h1>
                        </div>
                    </button>
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
            <div class="modal fade" id="masalahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi"
                                                rows="3"></textarea>
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
                var labelAkarMasalah = document.getElementById('labelAkarMasalah');
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



        @elseif($sikluss == 2)
            <h1>Siklus 2</h1>
        @elseif($sikluss == 3)
            <h1>Siklus 3</h1>
        @elseif($sikluss == 4)
            <h1>Siklus 4</h1>
        @endif


    @endsection
