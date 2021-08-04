@extends('admin/master')

@section('title',"Data Setting - Admin")
@section('content')
	<!-- Content area -->
	<div class="content container pt-3">

		<div class="row justify-content-center mb-3">
			<div class="col-lg-10">
				<div class="row justify-content-center">
					<div class="col-4">
						<button class="btn btn-info p-3 mr-3" id="spBtn" style="width: 100%">
							<div class="d-flex flex-column align-items-center">
								<i class="fa fa-users fa-2x"></i>
								<h1 class="m-0">Sekolah - Pengawas</h1>
							</div>
						</button>
					</div>
					<div class="col-4">
						<button class="btn btn-success p-3 mr-3" id="rkBtn" style="width: 100%">
							<div class="d-flex flex-column align-items-center">
								<i class="fa fa-clipboard fa-2x"></i>
								<h1 class="m-0">Raport KPI</h1>
							</div>
						</button>
					</div>
				</div>
			</div>
		</div>

		{{-- Tabel Sekolah-Pengawas --}}
		<div class="row" id="rowSp">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Sekolah-Pengawas</span>
						<button class="btn btn-primary" onclick="add('sekolahPengawas')" data-toggle="modal" data-target="#sekolahPengawas">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-sekolah-pengawas">
								<thead>
									<tr>
										<th>No</th>
										<th>Tahun</th>
										<th>Tanggal SK</th>
										<th>Nomor SK</th>
										<th>Sekolah</th>
										<th>Pengawas</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listSekolahPengawas->count() > 0)
									@php
									$no = 1
									@endphp
									@foreach ($listSekolahPengawas as $sekolahPengawas)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $sekolahPengawas->tahun }}</td>
											<td>{{ $sekolahPengawas->tgl_sk }}</td>
											<td>{{ $sekolahPengawas->nomor_sk }}</td>
											<td>{{ $sekolahPengawas->sekolah->nama }}</td>
											<td>{{ $sekolahPengawas->pengawas->nama }}</td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('sekolahPengawas',{{ $sekolahPengawas->id }})" class="dropdown-item" data-toggle="modal" data-target="#sekolahPengawas">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/sekolahPengawas/hapus/{{ $sekolahPengawas->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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

		{{-- Tabel Raport KPI --}}
		<div class="row" id="rowRk">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Raport KPI</span>
						<button class="btn btn-primary" onclick="add('raportKPI')" data-toggle="modal" data-target="#raportKPI">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-raport-kpi">
								<thead>
									<tr>
										<th>No</th>
										<th>Tahun</th>
										<th>Nilai KPI</th>
										<th>Kota/Kabupaten</th>
										<th>Sub Indikator</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listRaportKPI->count() > 0)
									@php
									$no = 1
									@endphp
									@foreach ($listRaportKPI as $raportKPI)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $raportKPI->tahun }}</td>
											<td>{{ $raportKPI->nilai_kpi }}</td>
											<td>{{ $raportKPI->kotakab->nama }}</td>
											<td>{{ $raportKPI->sub_indikator->nama }}</td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit('raportKPI',{{ $raportKPI->id }})" class="dropdown-item" data-toggle="modal" data-target="#raportKPI">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/raportKPI/hapus/{{ $raportKPI->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
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

	<!-- Modal Sekolah -->
	<div class="modal fade" id="sekolahPengawas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/sekolahPengawas/tambah" id="form_sekolah_pengawas">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_sekolah_pengawas">Tambah Sekolah - Pengawas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Tanggal SK</label>
							<input type="date" name="tgl_sk" class="form-control" id="sekolah_pengawas_tgl_sk" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Nomor SK</label>
							<input type="text" name="no_sk" class="form-control" id="sekolah_pengawas_no_sk" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Sekolah</label>
							<select name="sekolah_id" class="form-control" id="sekolah_pengawas_sekolah_id" required>
							@foreach ($listSekolah as $sekolah)
								<option value="{{ $sekolah->id }}">{{ $sekolah->nama }}</option>
							@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="col-form-label">Pengawas</label>
							<select name="pengawas_id" class="form-control" id="sekolah_pengawas_pengawas_id" required>
							@foreach ($listPengawas as $pengawas)
								<option value="{{ $pengawas->id }}">{{ $pengawas->nama }}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_sekolah_pengawas" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Sekolah -->

	<!-- Modal Raport KPI -->
	<div class="modal fade" id="raportKPI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/raportKPI/tambah" id="form_raport_kpi">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_raport_kpi">Tambah Raport KPI</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label class="col-form-label">Tahun</label>
						<select class="form-control" name="tahun" class="form-control" id="raport_kpi_tahun" required>
						@for ($year = (int)date('Y'); 1900 <= $year; $year--)
							<option value="{{ $year }}">{{ $year }}</option>
						@endfor
						</select>
						<div class="form-group">
							<label class="col-form-label">Nilai KPI</label>
							<input type="number" name="nilai_kpi" min="0" max="100" step="0.01" class="form-control" id="raport_kpi_nilai_kpi" required>
						</div>
						<div class="form-group">
							<label class="col-form-label">Kota Kabupaten</label>
							<select name="kota_kabupaten_id" class="form-control" id="raport_kpi_kota_kabupaten_id" required>
							@foreach ($listKota as $kota)
								<option value="{{ $kota->id }}">{{ $kota->nama }}</option>
							@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="col-form-label">Sub Indikator</label>
							<select name="sub_indikator_id" class="form-control" id="raport_kpi_sub_indikator_id" required>
							@foreach ($listSubIndikator as $subIndikator)
								<option value="{{ $subIndikator->id }}">{{ $subIndikator->nama }}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_raport_kpi" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Sekolah -->

	<script>
		const url = "{{URL::to('/')}}";
		const table = ['table-sekolah-pengawas','table-raport-kpi']
        const row = ['rowSp', 'rowRk']

		const SPBtn = document.getElementById('spBtn');
		const rkBtn = document.getElementById('rkBtn');

		window.addEventListener("DOMContentLoaded", () => {
            closeAll();
            SPBtn.addEventListener('click', () => {
                blockID('rowSp');
            })
            rkBtn.addEventListener('click', () => {
                blockID('rowRk');
            })
        })
		
		const blockID = (id) => {
            closeAll();
            document.getElementById(id).style.display = "block"
        }

        const closeAll = () => {
            row.forEach(id => {
                document.getElementById(id).style.display = "none"
            })
        }

		const edit = (table, id) => {
			if(table == "sekolahPengawas") {
				const form = document.getElementById('form_sekolah_pengawas');
				const title = document.getElementById('title_form_sekolah_pengawas');
				const tgl_sk = document.getElementById('sekolah_pengawas_tgl_sk');
				const no_sk = document.getElementById('sekolah_pengawas_no_sk');
				const sekolah_id = document.getElementById('sekolah_pengawas_sekolah_id');
				const pengawas_id = document.getElementById('sekolah_pengawas_pengawas_id');
				const btn = document.getElementById('btn_sekolah_pengawas');
				fetch(`${url}/sekolahPengawas/edit/${id}`)
					.then(response=>response.json())
					.then(data=>{
						form.action = `/sekolahPengawas/ubah/${id}`;
						title.innerText = "Edit Sekolah - Pengawas";
						tgl_sk.value = data.tgl_sk;
						no_sk.value = data.nomor_sk;
						sekolah_id.value = data.sekolah_id;
						pengawas_id.value = data.pengawas_id;
						btn.value = "Edit";
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
		$(document).ready(function() {
			table.forEach(id => {
				$(`#${id}`).DataTable();
			});
		});
	</script>
@endsection
