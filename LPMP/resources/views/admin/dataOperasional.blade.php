@extends('admin/master')

@section('title',"Data Operasional")
@section('content')
	<!-- Content area -->
	<div class="content container pt-3">
		{{-- Table Sekolah --}}
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Sekolah</span>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-sekolah">
								<thead>
									<tr>
										<th>No</th>
										<th>Sekolah</th>
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
											<td class="text-center">
												<div class="dropdown">
													<a onclick="fillRaport({{ $sekolah->id }})" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="modal" data-target="#raportSekolah">
														<i class="fa fa-chevron-right"></i>
													</a>
												</div>
											</td>
										</tr>
									@endforeach
								@else
									<tr align="center">
										<td colspan="5">Tidak ada sekolah</td>
									</tr>
								@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		{{-- Table Siklus Periode --}}
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Siklus Periode</span>
						<button onclick="add()" class="btn btn-primary" data-toggle="modal" data-target="#siklusPeriode">Tambah</button>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-siklus-periode">
								<thead>
									<tr>
										<th>No</th>
										<th>Siklus</th>
										<th>Tanggal Akhir</th>
										<th>Tanggal Selesai</th>
										<th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
									</tr>
								</thead>
								<tbody>
								@if ($listPeriode->count() > 0)
									@php
									$no = 1
									@endphp
									@foreach ($listPeriode as $periode)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $periode->siklus }}</td>
											<td>{{ $periode->tanggal_mulai }}</td>
											<td>{{ $periode->tanggal_selesai }}</td>
											<td class="text-center">
												<div class="dropdown">
													<a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown">
														<i class="fa fa-bars"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a onclick="edit({{ $periode->id }})" class="dropdown-item" data-toggle="modal" data-target="#siklusPeriode">
															<i class="fa fa-edit"></i>Edit
														</a>
														<a href="/siklusPeriode/hapus/{{ $periode->id }}" class="dropdown-item"><i class="fa fa-trash"></i>Hapus</a>
													</div>
												</div>
											</td>
										</tr>
									@endforeach
								@else
									<tr align="center">
										<td colspan="5">Tidak ada siklus</td>
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
	<!-- /content area -->

	<!-- Modal Siklus Periode -->
	<div class="modal fade" id="siklusPeriode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="POST" action="/siklusPeriode/tambah" id="form_siklus_periode">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="title_form_siklus_periode">Tambah Siklus Periode</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-form-label">Siklus</label>
							<input type="number" name="siklus" min="1" value="1" class="form-control" id="siklus_periode_siklus" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Tanggal Mulai</label>
							<input type="date" name="tanggal_mulai" class="form-control" id="siklus_periode_tanggal_mulai" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Tanggal Selesai</label>
							<input type="date" name="tanggal_selesai" class="form-control" id="siklus_periode_tanggal_selesai" required />
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn_siklus_periode" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Siklus Periode -->

	<!-- Modal Raport Sekolah -->
	<div class="modal fade" id="raportSekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Data Raport Sekolah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="table-responsive border-top-0">
						<table class="table text-nowrap" id="table-raport-sekolah">
							<thead>
								<tr>
									<th>No</th>
									<th>Sub Indikator</th>
									<th>Nilai</th>
								</tr>
							</thead>
							<tbody id="data">
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
	<!-- Modal Raport Sekolah -->

	<script>
		const url = "{{URL::to('/')}}";

		const add = () => {
			const form = document.getElementById('form_siklus_periode');
			const title = document.getElementById('title_form_siklus_periode');
			const siklus = document.getElementById('siklus_periode_siklus');
			const tanggalMulai = document.getElementById('siklus_periode_tanggal_mulai');
			const tanggalSelesai = document.getElementById('siklus_periode_tanggal_selesai');
			const btn = document.getElementById('btn_siklus_periode');
			
			form.action = `/siklusPeriode/tambah`;
			title.innerText = "Tambah Siklus Periode";
			siklus.value = "1"
			tanggalMulai.value = ""
			tanggalSelesai.value = ""
			btn.value = "Tambah";
		}
		const edit = (id) => {
			const form = document.getElementById('form_siklus_periode');
			const title = document.getElementById('title_form_siklus_periode');
			const siklus = document.getElementById('siklus_periode_siklus');
			const tanggalMulai = document.getElementById('siklus_periode_tanggal_mulai');
			const tanggalSelesai = document.getElementById('siklus_periode_tanggal_selesai');
			const btn = document.getElementById('btn_siklus_periode');
			fetch(`${url}/siklusPeriode/edit/${id}`)
				.then(response=>response.json())
				.then(data=>{
					form.action = `/siklusPeriode/ubah/${id}`;
					title.innerText = "Edit Siklus Periode";
					siklus.value = data.siklus;
					tanggalMulai.value = data.tanggal_mulai;
					tanggalSelesai.value = data.tanggal_selesai;
					btn.value = "Edit";
				})
		}
		const fillRaport = (id) => {
			const dataRaport = document.getElementById('data');
			fetch(`${url}/sekolah/fillRaport/${id}`)
				.then(response=>response.json())
				.then(data=>{
					console.log(data);
					if (data.length > 0) {
						data.forEach((element, index) => {
							dataRaport.innerHTML += `
								<tr>
									<td>${index+1}</td>
									<td>${element.sub_indikator}</td>
									<td>${element.nilai}</td>
								</tr>
							`
						});
					} else {
						dataRaport.innerHTML = `
							<tr align="center">
								<td colspan="3">Tidak ada raport sekolah</td>
							</tr>
						`
					}
				})
		}

		const table = ['table-siklus-periode','table-sekolah']
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