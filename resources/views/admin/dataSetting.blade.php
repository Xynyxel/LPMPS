@extends('admin/master')

@section('title',"Data Setting")
@section('content')
	<!-- Content area -->
	<div class="content container pt-3">
		{{-- Tabel Sekolah-Pengawas --}}
		<div class="row">
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
								@else
									<tr align="center">
										<td colspan="7">Tidak ada sekolah-pengawas</td>
									</tr>
								@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- Tabel Raport KPI --}}
		<div class="row">
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
								@else
									<tr align="center">
										<td colspan="6">Tidak ada raport KPI</td>
									</tr>
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
		const table = ['table-sekolah-pengawas','table-raport-kpi']
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