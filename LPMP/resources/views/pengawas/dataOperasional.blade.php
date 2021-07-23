@extends('pengawas/master')

@section('title',"DataOperasional - Pengawas")
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
        const table = ['table-sekolah', 'table-raport-sekolah']
        $(document).ready(function() {
            table.forEach(id => {
                $(`#${id}`).DataTable();
            });
        });
    </script>
@endsection