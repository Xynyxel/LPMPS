@extends('pengawas/master')

@section('title',"DataOperasional - Pengawas")
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
	</div>
	<!-- /content area -->

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