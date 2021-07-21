@extends('lpmp/master')

@section('title',"DataOperasional - LPMP")
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
	</div>
	<!-- /content area -->

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