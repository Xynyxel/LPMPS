@extends('pengawas/master')

@section('title',"DataMaster - Pengawas")
@section('content')
    {{-- Tabel Sekolah-Pengawas --}}
	<div class="content container pt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title font-weight-semibold">Data Sekolah-Pengawas</span>
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
    <script>
        const table = ['table-sekolah-pengawas']
        $(document).ready(function() {
            table.forEach(id => {
                $(`#${id}`).DataTable();
            });
        });
    </script>
@endsection