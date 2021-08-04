@extends('admin/master')

@section('title',"Data Operasional - Admin")
@section('content')
	<!-- Content area -->
	<div class="content container pt-3">
		<div class="row justify-content-center mb-3">
			<div class="col-lg-10">
				<div class="row justify-content-center">
					<div class="col-4">
						<button class="btn btn-info p-3 mr-3" id="raportBtn" style="width: 100%">
							<div class="d-flex flex-column align-items-center">
								<i class="fa fa-clipboard fa-2x"></i>
								<h1 class="m-0">Raport Sekolah</h1>
							</div>
						</button>
					</div>
					<div class="col-4">
						<button class="btn btn-success p-3 mr-3" id="siklusBtn" style="width: 100%">
							<div class="d-flex flex-column align-items-center">
								<i class="fa fa-sync-alt fa-2x"></i>
								<h1 class="m-0">Siklus Periode</h1>
							</div>
						</button>
					</div>
				</div>
			</div>
		</div>

		{{-- Table Sekolah --}}
		<div class="row" id="rowSekolah">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Raport Sekolah</span>
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
								@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		@if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif

		{{-- Table Siklus Periode --}}
		<div class="row" id="rowSiklusPeriode">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span class="card-title font-weight-semibold">Data Siklus Periode</span>
					</div>
					<div class="card-body">
						<div class="table-responsive border-top-0">
							<table class="table text-nowrap" id="table-siklus-periode">
								<thead>
									<tr>
										<th>No</th>
										<th>Siklus</th>
										<th>Tanggal Mulai</th>
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
							<input type="number" name="siklus" min="1" value="1" class="form-control" id="siklus_periode_siklus" readonly />
						</div>
						<div class="form-group">
							<label class="col-form-label">Tanggal Mulai</label>
							<input type="date" name="tanggal_mulai" onchange="setTanggalSelesai(event)" class="form-control" id="siklus_periode_tanggal_mulai" required />
						</div>
						<div class="form-group">
							<label class="col-form-label">Tanggal Selesai</label>
							<input type="date" name="tanggal_selesai" onchange="setTanggalMulai(event)" class="form-control" id="siklus_periode_tanggal_selesai" required />
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
						<table class="table" id="table-raport-sekolah">
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
		const table = ['table-siklus-periode','table-sekolah', 'table-raport-sekolah']
		const row = ['rowSekolah', 'rowSiklusPeriode']

		const raportBtn = document.getElementById('raportBtn');
		const siklusBtn = document.getElementById('siklusBtn');

		window.addEventListener("DOMContentLoaded", () => {
            closeAll();
            raportBtn.addEventListener('click', () => {
                blockID('rowSekolah');
            })
            siklusBtn.addEventListener('click', () => {
                blockID('rowSiklusPeriode');
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

		const setTanggalSelesai = (e) => {
			document.getElementById('siklus_periode_tanggal_selesai').min=e.target.value;
		}

		const setTanggalMulai = (e) => {
			document.getElementById('siklus_periode_tanggal_mulai').max=e.target.value;
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
			fetch(`${url}/sekolah/fillRaport/${id}`)
				.then(response=>response.json())
				.then(data=>{
                    $(document).ready(function() {
                        const raport = $(`#table-raport-sekolah`);
                        raport.DataTable().destroy();
                        raport.find('tbody').html("")
                        if (data.length > 0) {
                            data.forEach((element, index) => {
                                raport.find('tbody').append(`
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${element.sub_indikator}</td>
                                        <td>${element.nilai}</td>
                                    </tr>
                                `);
                            });
                        } else {
                            raport.DataTable()
                            raport.find('tbody').append(`
                                <tr align="center">
                                    <td colspan="3">Tidak ada raport sekolah</td>
                                </tr>
                            `);
                        }
                        raport.DataTable().draw();
                        
                    });                    
				})
		}

		$(document).ready(function() {
			table.forEach(id => {
				$(`#${id}`).DataTable();
			});
		});
	</script>
@endsection
