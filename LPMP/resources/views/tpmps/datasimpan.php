{{-- Tabel Standar --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    {{-- notifikasi form validasi --}}
                    @if ($errors->has('file'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif

                    {{-- notifikasi sukses --}}
                    @if ($sukses = Session::get('sukses_standar'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $sukses }}</strong>
                        </div>
                    @endif

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title font-weight-semibold">Standar</span>
                        <button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal"
                            data-target="#importExcelStandar">IMPORT EXCEL</button>
                    </div>
                    <!-- Import Excel -->
                    <div class="modal fade" id="importExcelStandar" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="/tpmps/dataOperasional/import_excel_standar"
                                enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import Standar Excel</h5>
                                    </div>
                                    <div class="modal-body">

                                        {{ csrf_field() }}

                                        <label>Pilih file excel untuk standar</label>
                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="card-body">
                        <div class="table-responsive border-top-0">
                            <table class="table text-nowrap" id="table-sekolah">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>tahun</th>
                                        <th>nomor</th>
                                        <th>nama</th>
                                        <th>status</th>
                                        <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($standar->count() > 0)
                                        @php $i=1 @endphp
                                        @foreach ($standar as $s)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $s->tahun }}</td>
                                                <td>{{ $s->nomor }}</td>
                                                <td>{{ $s->nama }}</td>
                                                <td><span
                                                        class="badge badge-success-100 text-success">{{ $s->status }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr align="center">
                                            <td colspan="6">Tidak ada standar</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Indikator --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    {{-- notifikasi form validasi --}}
                    @if ($errors->has('file'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif

                    {{-- notifikasi sukses --}}
                    @if ($sukses = Session::get('sukses_indikator'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $sukses }}</strong>
                        </div>
                    @endif

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title font-weight-semibold">Indikator</span>
                        <button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal"
                            data-target="#importExcelIndikator">IMPORT EXCEL</button>
                    </div>
                    <!-- Import Excel -->
                    <div class="modal fade" id="importExcelIndikator" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="/tpmps/dataOperasional/import_excel_indikator"
                                enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import Indikator Excel</h5>
                                    </div>
                                    <div class="modal-body">

                                        {{ csrf_field() }}

                                        <label>Pilih file excel untuk indikator</label>
                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="card-body">
                        <div class="table-responsive border-top-0">
                            <table class="table text-nowrap" id="table-sekolah">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>tahun</th>
                                        <th>nomor</th>
                                        <th>nama</th>
                                        <th>status</th>
                                        <th>standar_id</th>
                                        <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($indikator->count() > 0)
                                        @php $i=1 @endphp
                                        @foreach ($indikator as $s)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $s->tahun }}</td>
                                                <td>{{ $s->nomor }}</td>
                                                <td>{{ $s->nama }}</td>
                                                <td><span
                                                        class="badge badge-success-100 text-success">{{ $s->status }}</span>
                                                </td>
                                                <td>{{ $s->standar_id }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr align="center">
                                            <td colspan="6">Tidak ada Indikator</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Sub Indikator --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    {{-- notifikasi form validasi --}}
                    @if ($errors->has('file'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif

                    {{-- notifikasi sukses --}}
                    @if ($sukses = Session::get('sukses_subindikator'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $sukses }}</strong>
                        </div>
                    @endif


                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title font-weight-semibold">Sub Indikator</span>
                        <button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal"
                            data-target="#importExcelSubIndikator">IMPORT EXCEL</button>
                    </div>
                    <!-- Import Excel -->
                    <div class="modal fade" id="importExcelSubIndikator" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="/tpmps/dataOperasional/import_excel_sub_indikator"
                                enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import SubIndikator Excel</h5>
                                    </div>
                                    <div class="modal-body">

                                        {{ csrf_field() }}

                                        <label>Pilih file excel untuk subindikator</label>
                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="card-body">
                        <div class="table-responsive border-top-0">
                            <table class="table text-nowrap" id="table-sekolah">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>tahun</th>
                                        <th>nomor</th>
                                        <th>nama</th>
                                        <th>status</th>
                                        <th>indikator_id</th>
                                        <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sub_indikator->count() > 0)
                                        @php $i=1 @endphp
                                        @foreach ($sub_indikator as $s)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $s->tahun }}</td>
                                                <td>{{ $s->nomor }}</td>
                                                <td>{{ $s->nama }}</td>
                                                <td><span
                                                        class="badge badge-success-100 text-success">{{ $s->status }}</span>
                                                </td>
                                                <td>{{ $s->indikator_id }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr align="center">
                                            <td colspan="6">Tidak ada Sub Indikator</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Rapot Sekolah --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    {{-- notifikasi form validasi --}}
                    @if ($errors->has('file'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif

                    {{-- notifikasi sukses --}}
                    @if ($sukses = Session::get('sukses_rapotsekolah'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $sukses }}</strong>
                        </div>
                    @endif


                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title font-weight-semibold">Rapot Sekolah</span>
                        <button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal"
                            data-target="#importExcelRapotSekolah">IMPORT EXCEL</button>
                    </div>
                    <!-- Import Excel -->
                    <div class="modal fade" id="importExcelRapotSekolah" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="/tpmps/dataOperasional/import_excel_rapot_sekolah"
                                enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import Rapot Sekolah Excel</h5>
                                    </div>
                                    <div class="modal-body">

                                        {{ csrf_field() }}

                                        <label>Pilih file excel untuk rapot sekolah</label>
                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="card-body">
                        <div class="table-responsive border-top-0">
                            <table class="table text-nowrap" id="table-sekolah">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Nilai</th>
                                        <th>Sekolah</th>
                                        <th>sub_indikator_id</th>
                                        <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($rapot_sekolah->count() > 0)
                                        @php $i=1 @endphp
                                        @foreach ($rapot_sekolah as $s)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $s->tahun }}</td>
                                                <td>{{ $s->nilai }}</td>
                                                <td>{{ $s->sekolah->nama }}</td>
                                                <td>{{ $s->subIndikator->nama }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr align="center">
                                            <td colspan="6">Tidak ada Rapot Sekolah</td>
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