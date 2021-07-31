@extends('pengawas/master')

@section('title', 'DataOperasional - Pengawas')
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
                                        <th>Status</th>
                                        <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($listSekolah->count() > 0)
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($listSekolah as $sekolah)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $sekolah->nama }}</td>
                                                <td>
                                                    @if ($sekolah->tpmps->pengajuan_siklus[0]->status == 1)
                                                        <span class="badge badge-primary-100 text-primary">Diajukan</span>
                                                    @elseif($sekolah->tpmps->pengajuan_siklus[0]->status == 2)
                                                        <span class="badge badge-info-100 text-info">Diproses</span>
                                                    @elseif($sekolah->tpmps->pengajuan_siklus[0]->status == 3)
                                                        <span class="badge badge-success-100 text-success">Diterima</span>
                                                    @elseif($sekolah->tpmps->pengajuan_siklus[0]->status == 4)
                                                        <span class="badge badge-warning-100 text-warning">Komunikasi koordinasi</span>
                                                    @else
                                                        <span class="badge badge-secondary-100 text-secondary">Belum ada status</span>
                                                    @endif
												</td>
												<td class="text-center">
                                                    <div class="dropdown">
                                                        <a href="#"
                                                            class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"
                                                            data-toggle="dropdown">
                                                            <i class="fa fa-bars"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
															<a onclick="fillRaport({{ $sekolah->id }})"
																class="dropdown-item"
																data-toggle="modal" data-target="#raportSekolah">
																Raport Sekolah
															</a>
															<a href="/pengawas/dataOperasional/diproses/{{ $sekolah->tpmps->pengajuan_siklus[0]->id }}"
																class="dropdown-item">
																Diproses
															</a>
															<a href="/pengawas/dataOperasional/diterima/{{ $sekolah->tpmps->pengajuan_siklus[0]->id }}"
																class="dropdown-item">
																Diterima
															</a>
															<a href="/pengawas/dataOperasional/komunikasi/{{ $sekolah->tpmps->pengajuan_siklus[0]->id }}"
																class="dropdown-item">
																Komunikasi
															</a>
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

    <!-- Modal Raport Sekolah -->
    <div class="modal fade" id="raportSekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Raport Sekolah -->

    <script>
        const url = "{{ URL::to('/') }}";

        const fillRaport = (id) => {
            fetch(`${url}/sekolah/fillRaport/${id}`)
                .then(response => response.json())
                .then(data => {
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
