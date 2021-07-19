@extends('tpmps/master')

@section('title',"Data Operational - TPMPS")
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
					<button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal" data-target="#importExcelStandar">IMPORT EXCEL</button>
				</div>
				<!-- Import Excel -->
				<div class="modal fade" id="importExcelStandar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<form method="post" action="/tpmps/dataOperasional/import_excel_standar" enctype="multipart/form-data">
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
									@foreach($standar as $s)
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{$s->tahun}}</td>
										<td>{{$s->nomor}}</td>
										<td>{{$s->nama}}</td>
										<td><span class="badge badge-success-100 text-success">{{$s->status}}</span></td>
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
					<button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal" data-target="#importExcelIndikator">IMPORT EXCEL</button>
				</div>
				<!-- Import Excel -->
				<div class="modal fade" id="importExcelIndikator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<form method="post" action="/tpmps/dataOperasional/import_excel_indikator" enctype="multipart/form-data">
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
									@foreach($indikator as $s)
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{$s->tahun}}</td>
										<td>{{$s->nomor}}</td>
										<td>{{$s->nama}}</td>
										<td><span class="badge badge-success-100 text-success">{{$s->status}}</span></td>
                                        <td>{{$s->standar_id}}</td>
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
					<button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal" data-target="#importExcelSubIndikator">IMPORT EXCEL</button>
				</div>
				<!-- Import Excel -->
				<div class="modal fade" id="importExcelSubIndikator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<form method="post" action="/tpmps/dataOperasional/import_excel_sub_indikator" enctype="multipart/form-data">
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
									@foreach($sub_indikator as $s)
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{$s->tahun}}</td>
										<td>{{$s->nomor}}</td>
										<td>{{$s->nama}}</td>
										<td><span class="badge badge-success-100 text-success">{{$s->status}}</span></td>
                                        <td>{{$s->indikator_id}}</td>
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
					<button class="btn btn-primary" onclick="add('sekolah')" data-toggle="modal" data-target="#importExcelRapotSekolah">IMPORT EXCEL</button>
				</div>
				<!-- Import Excel -->
				<div class="modal fade" id="importExcelRapotSekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<form method="post" action="/tpmps/dataOperasional/import_excel_rapot_sekolah" enctype="multipart/form-data">
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
									@foreach($rapot_sekolah as $s)
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{$s->tahun}}</td>
										<td>{{$s->nilai}}</td>
										<td>{{$s->sekolah->nama}}</td>
                                        <td>{{$s->subIndikator->nama}}</td>
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
<script>
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
	}
</script>
@endsection
