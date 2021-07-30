@extends('admin/master')

@section('title',"Data Master")
@section('content')

	<!-- Content area -->
	<div class="content container pt-3">
		{{-- First Layer --}}
		<div class="row pb-3 justify-content-md-center">
			<div class="col-lg-10">
				<div class="row">
					<div class="col-3">
						<button class="btn btn-info p-3 mr-3" id="penggunaBtn" style="width: 100%">
							<div class="d-flex flex-column align-items-center">
								<i class="fa fa-users"></i>
								<h1 class="m-0">Pengguna</h1>
							</div>
						</button>
					</div>
					<div class="col-3">
						<button class="btn btn-success p-3 mr-3" id="sekolahBtn" style="width: 100%">
							<div class="d-flex flex-column align-items-center">
								<i class="fa fa-school"></i>
								<h1 class="m-0">Sekolah</h1>
							</div>
						</button>
					</div>
					<div class="col-3">
						<button class="btn btn-primary p-3 mr-3" id="kotaBtn" style="width: 100%">
							<div class="d-flex flex-column align-items-center">
								<i class="fa fa-city"></i>
								<h1 class="m-0">Kota/Kabupaten</h1>
							</div>
						</button>
					</div>
					<div class="col-3">
						<button class="btn btn-danger p-3" id="mutuBtn" style="width: 100%">
							<div class="d-flex flex-column align-items-center">
								<i class="fa fa-exclamation-triangle"></i>
								<h1 class="m-0">Pemetaan Mutu</h1>
							</div>
						</button>
					</div>
				</div>
			</div>
		</div>
		<hr id="firstLayer" style="display: none">
		{{-- Second Layer --}}
		<div class="row pb-3" id="pengguna" style="display: none">
			<div class="col-lg-12 d-flex justify-content-center">
				<button class="btn btn-primary p-3 mr-3" id="pengguna1">
					<div class="d-flex flex-column align-items-center">
						<h1 class="m-0">TPMPS</h1>
					</div>
				</button>
				<button class="btn btn-primary p-3 mr-3" id="pengguna2">
					<div class="d-flex flex-column align-items-center">
						<h1 class="m-0">Pengawas</h1>
					</div>
				</button>
				<button class="btn btn-primary p-3 mr-3" id="pengguna3">
					<div class="d-flex flex-column align-items-center">
						<h1 class="m-0">LPMP</h1>
					</div>
				</button>
			</div>
		</div>
		<div class="row pb-3" id="mutu" style="display: none">
			<div class="col-lg-12 d-flex justify-content-center">
				<button class="btn btn-primary p-3 mr-3" id="mutu1">
					<div class="d-flex flex-column align-items-center">
						<h1 class="m-0">Standar</h1>
					</div>
				</button>
				<button class="btn btn-primary p-3 mr-3" id="mutu2">
					<div class="d-flex fStlex-column align-items-center">
						<h1 class="m-0">Indikator</h1>
					</div>
				</button>
				<button class="btn btn-primary p-3 mr-3" id="mutu3">
					<div class="d-flex flex-column align-items-center">
						<h1 class="m-0">Sub Indikator</h1>
					</div>
				</button>
				<button class="btn btn-primary p-3 mr-3" id="mutu4">
					<div class="d-flex flex-column align-items-center">
						<h1 class="m-0">Akar Masalah</h1>
					</div>
				</button>
			</div>
		</div>
		<hr id="secondLayer">
		{{-- Tabel Sekolah --}}
		<div class="row" id="rowSekolah" style="display: none">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Sekolah</span>
						<button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal" data-target="#sekolah">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-sekolah">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Telepon</th>
										<th>Kabupaten/Kota</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listSekolah->count() > 0)
									@php
									$no = 1
									@endphp
									@foreach ($listSekolah as $sekolah)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $sekolah->nama }}</td>
											<td>{{ $sekolah->alamat }}</td>
											<td>{{ $sekolah->telefon }}</td>
											<td>{{ $sekolah->kotakab->nama }}</td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('sekolah',{{ $sekolah->id }})" class="dropdown-item" data-toggle="modal" data-target="#sekolah">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/sekolah/hapus/{{ $sekolah->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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

		{{-- Tabel Standar --}}
		<div class="row" id="rowStandar" style="display: none">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Standar</span>
						<button onclick="add('standar')" class="btn btn-primary" data-toggle="modal" data-target="#standar">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-standar">
								<thead>
									<tr>
										<th>No</th>
										<th>Tahun</th>
										<th>Nomor</th>
										<th>Nama</th>
										<th>Status</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listStandar->count() > 0)
									@php
									$no = 1
									@endphp
									@foreach ($listStandar as $standar)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $standar->tahun }}</td>
											<td>{{ $standar->nomor }}</td>
											<td>{{ $standar->nama }}</td>
											<td><span class="badge badge-success-100 text-success">{{ $standar->status }}</span></td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('standar',{{ $standar->id }})" class="dropdown-item" data-toggle="modal" data-target="#standar">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/standar/hapus/{{ $standar->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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

		{{-- Tabel Indikator --}}
		<div class="row" id="rowIndikator" style="display: none">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Indikator</span>
						<button onclick="add('indikator')" class="btn btn-primary" data-toggle="modal" data-target="#indikator">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-indikator">
								<thead>
									<tr>
										<th>No</th>
										<th>Tahun</th>
										<th>Nomor</th>
										<th>Nama</th>
										<th>Standar</th>
										<th>Status</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listIndikator->count() > 0) 
									@php
									$no = 1
									@endphp
									@foreach ($listIndikator as $indikator)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $indikator->tahun }}</td>
											<td>{{ $indikator->nomor }}</td>
											<td>{{ $indikator->nama }}</td>
											<td>{{ $indikator->standar->nama }}</td>
											<td><span class="badge badge-success-100 text-success">{{ $indikator->status }}</span></td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('indikator',{{ $indikator->id }})" class="dropdown-item" data-toggle="modal" data-target="#indikator">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/indikator/hapus/{{ $indikator->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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
	
		{{-- Tabel Sub Indikator --}}
		<div class="row" id="rowSubIndikator" style="display: none">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Sub Indikator</span>
						<button onclick="add('subIndikator')" class="btn btn-primary" data-toggle="modal" data-target="#subIndikator">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-sub-indikator">
								<thead>
									<tr>
										<th>No</th>
										<th>Tahun</th>
										<th>Nomor</th>
										<th>Nama</th>
										<th>Indikator</th>
										<th>Status</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listSubIndikator->count() > 0) 
									@php
									$no = 1
									@endphp
									@foreach ($listSubIndikator as $subIndikator)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $subIndikator->tahun }}</td>
											<td>{{ $subIndikator->nomor }}</td>
											<td>{{ $subIndikator->nama }}</td>
											<td>{{ $subIndikator->indikator->nama }}</td>
											<td><span class="badge badge-success-100 text-success">{{ $subIndikator->status }}</span></td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('subIndikator',{{ $subIndikator->id }})" class="dropdown-item" data-toggle="modal" data-target="#subIndikator">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/subIndikator/hapus/{{ $subIndikator->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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

		{{-- Tabel Akar Masalah --}}
		<div class="row" id="rowAkarMasalah" style="display: none">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Akar Masalah</span>
						<button onclick="add('akarMasalah')" class="btn btn-primary" data-toggle="modal" data-target="#akarMasalah">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-akar-masalah">
								<thead>
									<tr>
										<th>No</th>
										<th>Tahun</th>
										<th>Deskripsi</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listAkarMasalah->count() > 0)
									@php
									$no = 1
									@endphp
									@foreach ($listAkarMasalah as $akarMasalah)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $akarMasalah->tahun }}</td>
											<td>{{ $akarMasalah->deskripsi }}</td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('akarMasalah',{{ $akarMasalah->id }})" class="dropdown-item" data-toggle="modal" data-target="#akarMasalah">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/akarMasalah/hapus/{{ $akarMasalah->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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

		{{-- Tabel Kota --}}
		<div class="row" id="rowKota" style="display: none">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Kota/Kabupaten</span>
						<button onclick="add('kota')" class="btn btn-primary" data-toggle="modal" data-target="#kota">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-kota">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($kotakab->count() > 0)
									@php
									$no = 1
									@endphp
									@foreach ($kotakab as $kota)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $kota->nama }}</td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('kota',{{ $kota->id }})" class="dropdown-item" data-toggle="modal" data-target="#kota">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/kotaKabupaten/hapus/{{ $kota->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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

		{{-- Tabel TPMPS --}}
		<div class="row" id="rowTPMPS" style="display: none">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data TPMPS</span>
						<button onclick="add('tpmps')" class="btn btn-primary" data-toggle="modal" data-target="#tpmps">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-tpmps">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Password</th>
										<th>Sekolah</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listTPMPS->count() > 0)
									@php
									$no = 1
									@endphp
									@foreach ($listTPMPS as $tpmps)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $tpmps->nama }}</td>
											<td>{{ $tpmps->username }}</td>
											<td>{{ $tpmps->password }}</td>
											<td>{{ $tpmps->sekolah->nama }}</td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('tpmps',{{ $tpmps->id }})" class="dropdown-item" data-toggle="modal" data-target="#tpmps">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/tpmps/hapus/{{ $tpmps->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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

		{{-- Tabel Pengawas --}}
		<div class="row" id="rowPengawas" style="display: none">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Pengawas</span>
						<button onclick="add('pengawas')" class="btn btn-primary" data-toggle="modal" data-target="#pengawas">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-pengawas">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Password</th>
										<th>Asal</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listPengawas->count() > 0)
									@php
									$no = 1
									@endphp
									@foreach ($listPengawas as $pengawas)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $pengawas->nama }}</td>
											<td>{{ $pengawas->username }}</td>
											<td>{{ $pengawas->password }}</td>
											<td>{{ $pengawas->asal }}</td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('pengawas',{{ $pengawas->id }})" class="dropdown-item" data-toggle="modal" data-target="#pengawas">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/pengawas/hapus/{{ $pengawas->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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

		{{-- Tabel LPMP --}}
		<div class="row" id="rowLPMP" style="display: none">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data LPMP</span>
						<button onclick="add('lpmp')" class="btn btn-primary" data-toggle="modal" data-target="#lpmp">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-lpmp">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Password</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listLPMP->count() > 0)
									@php
									$no = 1
									@endphp
									@foreach ($listLPMP as $lpmp)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $lpmp->nama }}</td>
											<td>{{ $lpmp->username }}</td>
											<td>{{ $lpmp->password }}</td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('lpmp',{{ $lpmp->id }})" class="dropdown-item" data-toggle="modal" data-target="#lpmp">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/lpmp/hapus/{{ $lpmp->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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
	</div>
	<!-- /content area -->

	<!-- Modal Sekolah -->
	<div class="modal fade" id="sekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/sekolah/tambah" id="form_sekolah">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_sekolah">Tambah Sekolah</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Nama Sekolah</label>
							<input type="text" name="nama" class="form-control" id="school_name" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Alamat</label>
							<textarea name="alamat" class="form-control" id="school_address" required></textarea>
						</div>
						<div class="form-group">
							<label class="col-form-label">Nomor Telepon</label>
							<input type="text" name="no_telp" class="form-control" id="school_telp" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Kabupaten/Kota</label>
							<select name="kota" class="form-control" id="school_city" required>
							@foreach ($kotakab as $kota)
								<option value="{{ $kota->id }}">{{ $kota->nama }}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_school" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Sekolah -->

	<!-- Modal Standar -->
	<div class="modal fade" id="standar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/standar/tambah" id="form_standar">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_standar">Tambah Standar</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Tahun Standar</label>
							<select class="form-control" name="tahun" class="form-control" id="standar_year" required>
							@for ($year = (int)date('Y'); 1900 <= $year; $year--)
								<option value="{{ $year }}">{{ $year }}</option>
							@endfor
							</select>
						</div>
						<div class="form-group">
							<label class="col-form-label">Nomor Standar</label>
							<input type="text" name="nomor" class="form-control" id="standar_number" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Nama Standar</label>
							<input type="text" name="nama" class="form-control" id="standar_name" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Status</label>
							<input type="number" min="0" value="0" name="status" class="form-control" id="standar_status" required />
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_standar" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Standar -->

	<!-- Modal Kota/Kabupaten -->
	<div class="modal fade" id="kota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/kotaKabupaten/tambah" id="form_kota">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_kota">Tambah Kota/Kabupaten</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Nama</label>
							<input type="text" name="nama" class="form-control" id="kota_nama" required />
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_kota" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Kota/Kabupaten -->

	<!-- Modal Indikator -->
	<div class="modal fade" id="indikator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/indikator/tambah" id="form_indikator">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_indikator">Tambah Indikator</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Tahun Indikator</label>
							<select class="form-control" name="tahun" class="form-control" id="indikator_year" required>
							@for ($year = (int)date('Y'); 1900 <= $year; $year--)
								<option value="{{ $year }}">{{ $year }}</option>
							@endfor
							</select>
						</div>
						<div class="form-group">
							<label class="col-form-label">Nomor Indikator</label>
							<input type="text" name="nomor" class="form-control" id="indikator_number" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Nama Indikator</label>
							<input type="text" name="nama" class="form-control" id="indikator_name" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Status Indikator</label>
							<input type="number" min="0" value="0" name="status" class="form-control" id="indikator_status" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Standar</label>
							<select name="standar_id" class="form-control" id="indikator_standar_id" required />
							@foreach ($listStandar as $standar)
								<option value="{{ $standar->id }}">{{ $standar->nama }}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_indikator" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Indikator -->

	<!-- Modal Sub Indikator -->
	<div class="modal fade" id="subIndikator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/subIndikator/tambah" id="form_sub_indikator">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_sub_indikator">Tambah Sub Indikator</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Tahun Sub Indikator</label>
							<select class="form-control" name="tahun" class="form-control" id="sub_indikator_year" required>
							@for ($year = (int)date('Y'); 1900 <= $year; $year--)
								<option value="{{ $year }}">{{ $year }}</option>
							@endfor
							</select>
						</div>
						<div class="form-group">
							<label class="col-form-label">Nomor Sub Indikator</label>
							<input type="text" name="nomor" class="form-control" id="sub_indikator_number" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Nama Sub Indikator</label>
							<input type="text" name="nama" class="form-control" id="sub_indikator_name" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Status Sub Indikator</label>
							<input type="number" min="0" value="0" name="status" class="form-control" id="sub_indikator_status" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Indikator</label>
							<select name="indikator_id" class="form-control" id="sub_indikator_indikator_id" required />
							@foreach ($listIndikator as $indikator)
								<option value="{{ $indikator->id }}">{{ $indikator->nama }}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_sub_indikator" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Sub Indikator -->

	<!-- Modal Akar Masalah -->
	<div class="modal fade" id="akarMasalah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/akarMasalahMaster/tambah" id="form_akar_masalah">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_akar_masalah">Tambah Akar Masalah</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Tahun Akar Masalah</label>
							<select class="form-control" name="tahun" class="form-control" id="akar_masalah_year" required>
							@for ($year = (int)date('Y'); 1900 <= $year; $year--)
								<option value="{{ $year }}">{{ $year }}</option>
							@endfor
							</select>
						</div>
						<div class="form-group">
							<label class="col-form-label">Deskripsi</label>
							<textarea name="deskripsi" class="form-control" id="akar_masalah_deskripsi" required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_akar_masalah" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Akar Masalah -->

	<!-- Modal TPMPS -->
	<div class="modal fade" id="tpmps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/tpmps/tambah" id="form_tpmps">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_tpmps">Tambah TPMPS</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Nama</label>
							<input type="text" name="nama" class="form-control" id="tpmps_nama" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Username</label>
							<input type="text" name="username" class="form-control" id="tpmps_username" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="text" name="password" class="form-control" id="tpmps_password" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Sekolah</label>
							<select name="sekolah_id" class="form-control" id="tpmps_sekolah_id" required />
							@foreach ($listSekolah as $sekolah)
								<option value="{{ $sekolah->id }}">{{ $sekolah->nama }}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_tpmps" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal TPMPS -->

	<!-- Modal Pengawas -->
	<div class="modal fade" id="pengawas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/pengawas/tambah" id="form_pengawas">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_pengawas">Tambah Pengawas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Nama</label>
							<input type="text" name="nama" class="form-control" id="pengawas_nama" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Username</label>
							<input type="text" name="username" class="form-control" id="pengawas_username" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="text" name="password" class="form-control" id="pengawas_password" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Asal</label>
							<input type="text" name="asal" class="form-control" id="pengawas_asal" required />
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_pengawas" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Pengawas -->

	<!-- Modal LPMP -->
	<div class="modal fade" id="lpmp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/lpmp/tambah" id="form_lpmp">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_lpmp">Tambah LPMP</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Nama</label>
							<input type="text" name="nama" class="form-control" id="lpmp_nama" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Username</label>
							<input type="text" name="username" class="form-control" id="lpmp_username" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="text" name="password" class="form-control" id="lpmp_password" required />
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_lpmp" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal LPMP -->

	<script>
		const url = "{{URL::to('/')}}";
		const table = ['table-kota','table-sekolah','table-standar','table-indikator',
			'table-sub-indikator','table-akar-masalah','table-tpmps','table-pengawas',
			'table-lpmp']
		const row = ['rowKota','rowSekolah','rowStandar','rowIndikator',
			'rowSubIndikator','rowAkarMasalah','rowTPMPS','rowPengawas',
			'rowLPMP']

		const penggunaBtn = document.getElementById('penggunaBtn');
		const sekolahBtn = document.getElementById('sekolahBtn');
		const kotaBtn = document.getElementById('kotaBtn');
		const mutuBtn = document.getElementById('mutuBtn');

		const pengguna = document.getElementById('pengguna');
		const pengguna1 = document.getElementById('pengguna1');
		const pengguna2 = document.getElementById('pengguna2');
		const pengguna3 = document.getElementById('pengguna3');

		const mutu = document.getElementById('mutu');
		const mutu1 = document.getElementById('mutu1');
		const mutu2 = document.getElementById('mutu2');
		const mutu3 = document.getElementById('mutu3');
		const mutu4 = document.getElementById('mutu4');

		const firstLayer = document.getElementById('firstLayer');
		const secondLayer = document.getElementById('secondLayer');

		window.addEventListener("DOMContentLoaded",() => {
			closeAll();
			penggunaBtn.addEventListener('click',()=>{
				blockID('pengguna');
				firstLayer.style.display="block";
			})
			pengguna1.addEventListener('click',()=>{
				blockID('rowTPMPS');
				firstLayer.style.display="block";
				document.getElementById("pengguna").style.display="block"
			})
			pengguna2.addEventListener('click',()=>{
				blockID('rowPengawas');
				firstLayer.style.display="block";
				document.getElementById("pengguna").style.display="block"
			})
			pengguna3.addEventListener('click',()=>{
				blockID('rowLPMP');
				firstLayer.style.display="block";
				document.getElementById("pengguna").style.display="block"
			})
			sekolahBtn.addEventListener('click',()=>{
				blockID('rowSekolah');
			})
			kotaBtn.addEventListener('click',()=>{
				blockID('rowKota');
			})
			mutuBtn.addEventListener('click',()=>{
				blockID('mutu');
				firstLayer.style.display="block";
			})
			mutu1.addEventListener('click',()=>{
				blockID('rowStandar');
				firstLayer.style.display="block";
				document.getElementById("mutu").style.display="block"
			})
			mutu2.addEventListener('click',()=>{
				blockID('rowIndikator');
				firstLayer.style.display="block";
				document.getElementById("mutu").style.display="block"
			})
			mutu3.addEventListener('click',()=>{
				blockID('rowSubIndikator');
				firstLayer.style.display="block";
				document.getElementById("mutu").style.display="block"
			})
			mutu4.addEventListener('click',()=>{
				blockID('rowAkarMasalah');
				firstLayer.style.display="block";
				document.getElementById("mutu").style.display="block"
			})
		})

		const blockID = (id) => {
			closeAll();
			document.getElementById(id).style.display="block"
		}

		const closeAll = () => {
			pengguna.style.display = "none";
			mutu.style.display = "none";
			firstLayer.style.display = "none";

			row.forEach(id=>{
				document.getElementById(id).style.display = "none"
			})
		}

		const edit = (table, id) => {
			if(table == "sekolah") {
				const form = document.getElementById('form_sekolah');
				const title = document.getElementById('title_form_sekolah');
				const nama = document.getElementById('school_name');
				const address = document.getElementById('school_address');
				const telp = document.getElementById('school_telp');
				const city = document.getElementById('school_city');
				const btn = document.getElementById('btn_school');
				fetch(`${url}/sekolah/edit/${id}`)
					.then(response=>response.json())
					.then(data=>{
						form.action = `/sekolah/ubah/${id}`;
						title.innerText = "Edit Sekolah";
						nama.value = data.nama;
						address.innerText = data.alamat;
						telp.value = data.telefon;
						city.value = data.kota_kabupaten_id;
						btn.value = "Edit";
					})
			} 
			else if(table == "standar") {
				const form = document.getElementById('form_standar');
				const title = document.getElementById('title_form_standar');
				const tahun = document.getElementById('standar_year');
				const nomor = document.getElementById('standar_number');
				const nama = document.getElementById('standar_name');
				const status = document.getElementById('standar_status');
				const btn = document.getElementById('btn_standar');
				fetch(`${url}/standar/edit/${id}`)
					.then(response=>response.json())
					.then(data=>{
						form.action = `/standar/ubah/${id}`;
						title.innerText = "Edit Standar";
						tahun.value = data.tahun;
						nomor.value = data.nomor;
						nama.value = data.nama;
						status.value = data.status;
						btn.value = "Edit";
					})
			}
			else if(table == "kota") {
				const form = document.getElementById('form_kota');
				const title = document.getElementById('title_form_kota');
				const nama = document.getElementById('kota_nama');
				const btn = document.getElementById('btn_kota');

				fetch(`${url}/kotaKabupaten/edit/${id}`)
					.then(response=>response.json())
					.then(data=>{
						form.action = `/kotaKabupaten/ubah/${id}`;
						title.innerText = "Edit Kota/Kabupaten";
						nama.value = data.nama;
						btn.value = "Edit";
					})
			}
			else if(table == "indikator") {
				const form = document.getElementById('form_indikator');
				const title = document.getElementById('title_form_indikator');
				const tahun = document.getElementById('indikator_year');
				const nomor = document.getElementById('indikator_number');
				const nama = document.getElementById('indikator_name');
				const status = document.getElementById('indikator_status');
				const standar_id = document.getElementById('indikator_standar_id');
				const btn = document.getElementById('btn_indikator');
				fetch(`${url}/indikator/edit/${id}`)
					.then(response=>response.json())
					.then(data=>{
						form.action = `/indikator/ubah/${id}`;
						title.innerText = "Edit Indikator";
						tahun.value = data.tahun;
						nomor.value = data.nomor;
						nama.value = data.nama;
						status.value = data.status;
						standar_id.value = data.standar_id;
						btn.value = "Edit";
					})
			}
			else if(table == "subIndikator") {
				const form = document.getElementById('form_sub_indikator');
				const title = document.getElementById('title_form_sub_indikator');
				const tahun = document.getElementById('sub_indikator_year');
				const nomor = document.getElementById('sub_indikator_number');
				const nama = document.getElementById('sub_indikator_name');
				const status = document.getElementById('sub_indikator_status');
				const indikator_id = document.getElementById('sub_indikator_indikator_id');
				const btn = document.getElementById('btn_sub_indikator');
				fetch(`${url}/subIndikator/edit/${id}`)
					.then(response=>response.json())
					.then(data=>{
						form.action = `/subIndikator/ubah/${id}`;
						title.innerText = "Edit Sub Indikator";
						tahun.value = data.tahun;
						nomor.value = data.nomor;
						nama.value = data.nama;
						status.value = data.status;
						indikator_id.value = data.indikator_id;
						btn.value = "Edit";
					})
			}
			else if(table == "akarMasalah") {
				const form = document.getElementById('form_akar_masalah');
				const title = document.getElementById('title_form_akar_masalah');
				const tahun = document.getElementById('akar_masalah_year');
				const deskripsi = document.getElementById('akar_masalah_deskripsi');
				const status = document.getElementById('akar_masalah_status');
				const sekolah_id = document.getElementById('akar_masalah_sekolah_id');
				const indikator_id = document.getElementById('akar_masalah_indikator_id');
				const btn = document.getElementById('btn_akar_masalah');
				fetch(`${url}/akarMasalah/edit/${id}`)
					.then(response=>response.json())
					.then(data=>{
						form.action = `/akarMasalah/ubah/${id}`;
						title.innerText = "Edit Akar Masalah";
						tahun.value = data.tahun;
						deskripsi.value = data.deskripsi;
						status.value = data.status;
						sekolah_id.value = data.sekolah_id;
						indikator_id.value = data.indikator_id;
						btn.value = "Edit";
					})
			}
			else if(table == "tpmps") {
				const form = document.getElementById('form_tpmps');
				const title = document.getElementById('title_form_tpmps');
				const nama = document.getElementById('tpmps_nama');
				const username = document.getElementById('tpmps_username');
				const password = document.getElementById('tpmps_password');
				const sekolah_id = document.getElementById('tpmps_sekolah_id');
				const btn = document.getElementById('btn_tpmps');
				fetch(`${url}/tpmps/edit/${id}`)
					.then(response=>response.json())
					.then(data=>{
						form.action = `/tpmps/ubah/${id}`;
						title.innerText = "Edit TPMPS";
						nama.value = data.nama;
						username.value = data.username;
						password.value = data.password;
						sekolah_id.value = data.sekolah_id;
						btn.value = "Edit";
					})
			}
			else if(table == "pengawas") {
				const form = document.getElementById('form_pengawas');
				const title = document.getElementById('title_form_pengawas');
				const nama = document.getElementById('pengawas_nama');
				const username = document.getElementById('pengawas_username');
				const password = document.getElementById('pengawas_password');
				const asal = document.getElementById('pengawas_asal');
				const btn = document.getElementById('btn_pengawas');
				fetch(`${url}/pengawas/edit/${id}`)
					.then(response=>response.json())
					.then(data=>{
						form.action = `/pengawas/ubah/${id}`;
						title.innerText = "Edit Pengawas";
						nama.value = data.nama;
						username.value = data.username;
						password.value = data.password;
						asal.value = data.asal;
						btn.value = "Edit";
					})
			}
			else if(table == "lpmp") {
				const form = document.getElementById('form_lpmp');
				const title = document.getElementById('title_form_lpmp');
				const nama = document.getElementById('lpmp_nama');
				const username = document.getElementById('lpmp_username');
				const password = document.getElementById('lpmp_password');
				const btn = document.getElementById('btn_lpmp');
				fetch(`${url}/lpmp/edit/${id}`)
					.then(response=>response.json())
					.then(data=>{
						form.action = `/lpmp/ubah/${id}`;
						title.innerText = "Edit LPMP";
						nama.value = data.nama;
						username.value = data.username;
						password.value = data.password;
						btn.value = "Edit";
					})
			}
		}

		const add = (table) => {
			if(table == "sekolah") {
				const form = document.getElementById('form_sekolah');
				const title = document.getElementById('title_form_sekolah');
				const nama = document.getElementById('school_name');
				const address = document.getElementById('school_address');
				const telp = document.getElementById('school_telp');
				const city = document.getElementById('school_city');
				const btn = document.getElementById('btn_school');

				form.action = "/sekolah/tambah";
				title.innerText = "Tambah Sekolah";
				nama.value = "";
				address.innerText = "";
				telp.value = "";
				city.value = "";
				btn.value = "Tambah";
			} 
			else if(table == "standar") {
				const form = document.getElementById('form_standar');
				const title = document.getElementById('title_form_standar');
				const tahun = document.getElementById('standar_year');
				const nomor = document.getElementById('standar_number');
				const nama = document.getElementById('standar_name');
				const status = document.getElementById('standar_status');
				const btn = document.getElementById('btn_standar');

				form.action = `/standar/tambah`;
				title.innerText = "Tambah Standar";
				tahun.value = 2021;
				nomor.value = "";
				nama.value = "";
				status.value = 0;
				btn.value = "Tambah";
			}
			else if(table == "kota") {
				const form = document.getElementById('form_kota');
				const title = document.getElementById('title_form_kota');
				const nama = document.getElementById('kota_nama');
				const btn = document.getElementById('btn_kota');

				form.action = `/kotaKabupaten/tambah`;
				title.innerText = "Tambah Kota/Kabupaten";
				nama.value = data.nama;
				btn.value = "Tambah";
			}
			else if(table == "indikator") {
				const form = document.getElementById('form_indikator');
				const title = document.getElementById('title_form_indikator');
				const tahun = document.getElementById('indikator_year');
				const nomor = document.getElementById('indikator_number');
				const nama = document.getElementById('indikator_name');
				const status = document.getElementById('indikator_status');
				const standar_id = document.getElementById('indikator_standar_id');
				const btn = document.getElementById('btn_indikator');

				form.action = `/indikator/tambah`;
				title.innerText = "Tambah Indikator";
				tahun.value = 2021;
				nomor.value = "";
				nama.value = "";
				status.value = 0;
				standar_id.value = "";
				btn.value = "Tambah";
			}
			else if(table == "subIndikator") {
				const form = document.getElementById('form_sub_indikator');
				const title = document.getElementById('title_form_sub_indikator');
				const tahun = document.getElementById('sub_indikator_year');
				const nomor = document.getElementById('sub_indikator_number');
				const nama = document.getElementById('sub_indikator_name');
				const status = document.getElementById('sub_indikator_status');
				const indikator_id = document.getElementById('sub_indikator_indikator_id');
				const btn = document.getElementById('btn_sub_indikator');

				form.action = `/subIndikator/tambah`;
				title.innerText = "Tambah Sub Indikator";
				tahun.value = 2021;
				nomor.value = "";
				nama.value = "";
				status.value = 0;
				indikator_id.value = "";
				btn.value = "Tambah";
			}
			else if(table == "akarMasalah") {
				const form = document.getElementById('form_akar_masalah');
				const title = document.getElementById('title_form_akar_masalah');
				const tahun = document.getElementById('akar_masalah_year');
				const deskripsi = document.getElementById('akar_masalah_deskripsi');
				const status = document.getElementById('akar_masalah_status');
				const sekolah_id = document.getElementById('akar_masalah_sekolah_id');
				const indikator_id = document.getElementById('akar_masalah_indikator_id');
				const btn = document.getElementById('btn_akar_masalah');

				form.action = `/akarMasalahMaster/tambah`;
				title.innerText = "Tambah Akar Masalah";
				tahun.value = 2021;
				deskripsi.innerText = "";
				status.value = "";
				sekolah_id.value = "";
				indikator_id.value = "";
				btn.value = "Tambah";
			}
			else if(table == "tpmps") {
				const form = document.getElementById('form_tpmps');
				const title = document.getElementById('title_form_tpmps');
				const nama = document.getElementById('tpmps_nama');
				const username = document.getElementById('tpmps_username');
				const password = document.getElementById('tpmps_password');
				const sekolah_id = document.getElementById('tpmps_sekolah_id');
				const btn = document.getElementById('btn_tpmps');

				form.action = `/tpmps/tambah`;
				title.innerText = "Tambah TPMPS";
				nama.value = "";
				username.value = "";
				password.value = "";
				sekolah_id.value = "";
				btn.value = "Tambah";
			}
			else if(table == "pengawas") {
				const form = document.getElementById('form_pengawas');
				const title = document.getElementById('title_form_pengawas');
				const nama = document.getElementById('pengawas_nama');
				const username = document.getElementById('pengawas_username');
				const password = document.getElementById('pengawas_password');
				const asal = document.getElementById('pengawas_asal');
				const btn = document.getElementById('btn_pengawas');

				form.action = `/pengawas/tambah`;
				title.innerText = "Tambah Pengawas";
				nama.value = "";
				username.value = "";
				password.value = "";
				asal.value = "";
				btn.value = "Tambah";
			}
			else if(table == "lpmp") {
				const form = document.getElementById('form_lpmp');
				const title = document.getElementById('title_form_lpmp');
				const nama = document.getElementById('lpmp_nama');
				const username = document.getElementById('lpmp_username');
				const password = document.getElementById('lpmp_password');
				const btn = document.getElementById('btn_lpmp');
				
				form.action = `/lpmp/tambah`;
				title.innerText = "Tambah LPMP";
				nama.value = ""
				username.value = ""
				password.value = ""
				btn.value = "Tambah";
			}
		}

		$(document).ready(function() {
			table.forEach(id => {
				$(`#${id}`).DataTable();
			});
		});
	</script>
@endsection

@section('notification')
	<!-- Notifications -->
	<div id="notifications" class="modal modal-right fade" tabindex="-1" aria-modal="true" role="dialog">
		<div class="modal-dialog modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-transparent border-0 align-items-center">
					<h5 class="modal-title font-weight-semibold">Notifications</h5>
					<button type="button" class="btn btn-icon btn-light btn-sm border-0 rounded-pill ml-auto" data-dismiss="modal"><i class="icon-cross2"></i></button>
				</div>

				<div class="modal-body p-0">
					<div class="bg-light text-muted py-2 px-3">New notifications</div>
					<div class="p-3">
						<div class="d-flex mb-3">
							<a href="#" class="mr-3">
								<img src="{{asset('images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
							</a>
							<div class="flex-1">
								<a href="#" class="font-weight-semibold">James</a> has completed the task <a href="#">Submit documents</a> from <a href="#">Onboarding</a> list

								<div class="bg-light border rounded p-2 mt-2">
									<label class="custom-control custom-checkbox custom-control-inline mx-1">
										<input type="checkbox" class="custom-control-input" checked disabled>
										<del class="custom-control-label">Submit personal documents</del>
									</label>
								</div>

								<div class="font-size-sm text-muted mt-1">2 hours ago</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<a href="#" class="mr-3">
								<img src="{{asset('images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
							</a>
							<div class="flex-1">
								<a href="#" class="font-weight-semibold">Margo</a> was added to <span class="font-weight-semibold">Customer enablement</span> channel by <a href="#">William Whitney</a>

								<div class="font-size-sm text-muted mt-1">3 hours ago</div>
							</div>
						</div>

						<div class="d-flex">
							<div class="mr-3">
								<div class="bg-danger-100 text-danger rounded-pill">
									<i class="icon-undo position-static p-2"></i>
								</div>
							</div>
							<div class="flex-1">
								Subscription <a href="#">#466573</a> from 10.12.2021 has been cancelled. Refund case <a href="#">#4492</a> created

								<div class="font-size-sm text-muted mt-1">4 hours ago</div>
							</div>
						</div>
					</div>

					<div class="bg-light text-muted py-2 px-3">Older notifications</div>
					<div class="p-3">
						<div class="d-flex mb-3">
							<a href="#" class="mr-3">
								<img src="{{asset('images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
							</a>
							<div class="flex-1">
								<a href="#" class="font-weight-semibold">Christine</a> commented on your community <a href="#">post</a> from 10.12.2021

								<div class="font-size-sm text-muted mt-1">2 days ago</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<a href="#" class="mr-3">
								<img src="{{asset('images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
							</a>
							<div class="flex-1">
								<a href="#" class="font-weight-semibold">Mike</a> added 1 new file(s) to <a href="#">Product management</a> project

								<div class="bg-light rounded p-2 mt-2">
									<div class="d-flex align-items-center mx-1">
										<div class="mr-2">
											<i class="icon-file-pdf text-danger icon-2x position-static"></i>
										</div>
										<div class="flex-1">
											new_contract.pdf
											<div class="font-size-sm text-muted">112KB</div>
										</div>
										<div class="ml-2">
											<a href="#" class="btn btn-dark-100 text-body btn-icon btn-sm border-transparent rounded-pill">
												<i class="icon-arrow-down8"></i>
											</a>
										</div>
									</div>
								</div>

								<div class="font-size-sm text-muted mt-1">1 day ago</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<div class="mr-3">
								<div class="bg-success-100 text-success rounded-pill">
									<i class="icon-calendar3 position-static p-2"></i>
								</div>
							</div>
							<div class="flex-1">
								All hands meeting will take place coming Thursday at 13:45. <a href="#">Add to calendar</a>

								<div class="font-size-sm text-muted mt-1">2 days ago</div>
							</div>
						</div>

						<div class="d-flex mb-3">
							<a href="#" class="mr-3">
								<img src="{{asset('images/placeholders/placeholder.jpg')}}" width="36" height="36" class="rounded-circle" alt="">
							</a>
							<div class="flex-1">
								<a href="#" class="font-weight-semibold">Nick</a> requested your feedback and approval in support request <a href="#">#458</a>

								<div class="font-size-sm text-muted mt-1">3 days ago</div>
							</div>
						</div>

						<div class="d-flex">
							<div class="mr-3">
								<div class="bg-primary-100 text-primary rounded-pill">
									<i class="icon-people position-static p-2"></i>
								</div>
							</div>
							<div class="flex-1">
								<span class="font-weight-semibold">HR department</span> requested you to complete internal survey by Friday

								<div class="font-size-sm text-muted mt-1">3 days ago</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /notifications -->
@endsection