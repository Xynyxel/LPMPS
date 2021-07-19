@extends('admin/master')

@section('title',"Data Operasional")
@section('content')
@php
    if(isset($siklus)) {
        $arr = explode("-",$siklus->tanggal_mulai);
        $arr2 = explode("-",$siklus->tanggal_selesai);
        $mulai = $arr[2]."-".$arr[1]."-".$arr[0];
        $selesai = $arr2[2]."-".$arr2[1]."-".$arr2[0];
    }
@endphp
	<!-- Content area -->
	<div class="content container pt-3">
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
							<table class="table text-nowrap" id="table-siklus_periode">
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
		
		{{-- Countdown --}}
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Periode Siklus SPMI</span>
					</div>
					<div class="card-body p-3">
						<div class="d-flex flex-row align-items-center justify-content-between">
							<h1 class="mr-3" id="title_siklus">
								Siklus {{ $siklus->siklus }}
							</h1>
							<div class="d-flex flex-row align-items-baseline">
								<h2 id="date-now">{{ $mulai }}</h2>
								<i class="fa fa-arrow-right mx-3"></i>
								<h2 id="date-end">{{ $selesai }}</h2>
							</div>
						</div>
						<div style="height: 2px; background-color: #ddd	"></div>
						<div id="time" class="d-flex flex-row align-items-start justify-content-around">
							<h1 id="days" class="display-1">0</h1>
							<h1 id="daysText" class="display-4">days</h1>
							<h1 id="hours" class="display-1">00</h1>
							<h1 id="hoursText" class="display-4">hours</h1>
							<h1 id="minutes" class="display-1">00</h1>
							<h1 id="minutesText" class="display-4">minutes</h1>
							<h1 id="seconds" class="display-1">00</h1>
							<h1 id="secondsText" class="display-4">seconds</h1>
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

	<script>
		const url = "{{URL::to('/')}}";
		const dateEnd = document.getElementById('date-end');

		const daysText = document.getElementById('days');
		const dText = document.getElementById('daysText');
		const hoursText = document.getElementById('hours');
		const hText = document.getElementById('hoursText');
		const minutesText = document.getElementById('minutes');
		const mText = document.getElementById('minutesText');
		const secondsText = document.getElementById('seconds');
		const sText = document.getElementById('secondsText');
		
		const arr = dateEnd.innerText.split("-");
		const end = new Date(`${arr[2]}-${arr[1]}-${arr[0]} 00:00:00`);

		const setTime = setInterval(()=>{
			now();
		},1000)
		
		const now = () => {
			const date = new Date();
			const dif = end - date;

			let milliseconds = parseInt((dif % 1000) / 100);
			let seconds = Math.floor((dif / 1000) % 60);
			let minutes = Math.floor((dif / (1000 * 60)) % 60);
			let hours = Math.floor((dif / (1000 * 60 * 60)) % 24);
			let days = Math.floor((end - date) / (1000 * 60 * 60 * 24));

			hours = (hours < 10) ? "0" + hours : hours;
			minutes = (minutes < 10) ? "0" + minutes : minutes;
			seconds = (seconds < 10) ? "0" + seconds : seconds;
			
			dText.innerText = (days == 1) ? "day" : "days";
			hText.innerText = (hours == 1) ? "hour" : "hours";
			mText.innerText = (minutes == 1) ? "minute" : "minutes";
			sText.innerText = (seconds == 1) ? "second" : "seconds";
			
			if(days == 0 && hours == "00" && minutes == "00" && seconds == "00") {
				location.reload();
				clearInterval(setTime);
			}

			daysText.innerText = days;
			hoursText.innerText = hours;
			minutesText.innerText = minutes;
			secondsText.innerText = seconds;
			// console.log(date);
			// console.log(end);
			// console.log(hours + ":" + minutes + ":" + seconds);
		}

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
		const table = ['table-siklus_periode']
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