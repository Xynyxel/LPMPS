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
								<form method="post" action="/tpmps/dataOperasional/importExcelPemetaanMutu"
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
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
											<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
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
        @elseif($sikluss == 2)
            <h1>Siklus 2</h1>
        @elseif($sikluss == 3)
            <h1>Siklus 2</h1>
        @elseif($sikluss == 4)
            <h1>Siklus 2</h1>
        @endif

        
@endsection
