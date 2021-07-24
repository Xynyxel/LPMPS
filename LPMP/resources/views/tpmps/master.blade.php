<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="{{ asset('Logo_LPMP.png') }}" />
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
	<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('js/main/jquery.min.js')}}"></script>
	<script src="{{asset('js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('js/plugins/visualization/echarts/echarts.min.js')}}"></script>
	<script src="{{asset('js/plugins/maps/echarts/world.js')}}"></script>

	<script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset('js/demo_charts/pages/dashboard_6/light/area_gradient.js')}}"></script>
	<script src="{{asset('js/demo_charts/pages/dashboard_6/light/map_europe_effect.js')}}"></script>
	<script src="{{asset('js/demo_charts/pages/dashboard_6/light/progress_sortable.js')}}"></script>
	<script src="{{asset('js/demo_charts/pages/dashboard_6/light/bars_grouped.js')}}"></script>
	<script src="{{asset('js/demo_charts/pages/dashboard_6/light/line_label_marks.js')}}"></script>
	<!-- /theme JS files -->
</head>
<body>
	
@php
if(isset($siklus)) {
	$arr = explode("-",$siklus->tanggal_mulai);
	$arr2 = explode("-",$siklus->tanggal_selesai);
	$mulai = $arr[2]."-".$arr[1]."-".$arr[0];
	$selesai = $arr2[2]."-".$arr2[1]."-".$arr2[0];
}
@endphp
	<!-- Main navbar -->
	<div class="navbar navbar-expand-xl navbar-light navbar-static px-0">
		<div class="d-flex flex-1 pl-3">
			<div class="navbar-brand wmin-0 mr-1">
				<a href="index.html" class="d-inline-block">
					<img src="{{asset('images/logo_dark.png')}}" class="d-none d-sm-block" alt="">
					<img src="{{asset('images/logo_icon_dark.png')}}" class="d-sm-none" alt="">
				</a>
			</div>
		</div>

		<div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0">
			<ul class="navbar-nav navbar-nav-underline flex-row text-nowrap mx-auto">
				<li class="nav-item">
					<a href="/tpmps/home" class="navbar-nav-link {{ (request()->is('tpmps/home')) ? 'active' : '' }}">
						<i class="icon-home4 mr-2"></i>
						Home
					</a>
				</li>

				<li class="nav-item mega-menu-full nav-item-dropdown-xl">
					<a href="/tpmps/dataOperasional" class="navbar-nav-link {{ (request()->is('tpmps/dataOperasional')) ? 'active' : '' }}">
						<i class="icon-make-group mr-2"></i>
						Data Operasional
					</a>
				</li>

				<li class="nav-item dropdown nav-item-dropdown-xl">
					<a href="/tpmps/laporan" class="navbar-nav-link {{ (request()->is('tpmps/laporan')) ? 'active' : '' }}">
						<i class="icon-strategy mr-2"></i>
						Laporan
					</a>
				</li>
			</ul>
		</div>

		<div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
			<ul class="navbar-nav navbar-nav-underline flex-row">
				<li class="nav-item">
					<a href="#notifications" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="modal">
						<i class="icon-bell2"></i>
						<span class="badge badge-mark border-pink bg-pink"></span>
					</a>
				</li>
		
				<li class="nav-item nav-item-dropdown-xl dropdown dropdown-user h-100">
					<a href="#" class="navbar-nav-link navbar-nav-link-toggler d-flex align-items-center h-100 dropdown-toggle" data-toggle="dropdown">
						<img src="{{asset('images/placeholders/placeholder.jpg')}}" class="rounded-circle mr-xl-2" height="38" alt="">
						<span class="d-none d-xl-block">{{ $LoggedUserInfo['nama'] }}</span>
					</a>
		
					<div class="dropdown-menu dropdown-menu-right">
						{{-- <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
						<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-primary badge-pill ml-auto">58</span></a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a> --}}
						<a href="{{ route('auth.logoutTpmps') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
		

	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Inner content -->
			<div class="content-inner">

				<div class="page-header mt-4">
					<div class="page-header-content container">
						{{-- Countdown --}}
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header d-flex justify-content-between align-items-center">
										<span class="card-title font-weight-semibold">Periode Siklus SPMI</span>
									</div>
									<div class="card-body p-3">
										@if ($siklus)
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
										@else
											<div class="d-flex flex-row align-items-center justify-content-between">
												<h1 class="mr-3">
													Tidak ada siklus yang berjalan
												</h1>
											</div>
										@endif
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>

                @yield('content')

                <!-- Footer -->
				<div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
							<i class="icon-unfold mr-2"></i>
							Footer
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-footer">
						<span class="navbar-text">
							&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="https://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
						</span>

						{{-- <ul class="navbar-nav ml-lg-auto">
							<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
							<li class="nav-item"><a href="https://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
							<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
						</ul> --}}
					</div>
				</div>
				<!-- /footer -->
			</div>
			<!-- /inner content -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->

    @yield('notification')

	@if (Session::get('fail'))
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog alert-danger" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Warning</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					{{ Session::get('fail') }}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary alert alert-danger" data-dismiss="modal">Ok I Understand</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
			keyboard: false
		})
		myModal.show()
	</script>
	@endif
	
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
			
			if(days == 0 && hours == 0 && minutes == 0 && seconds == 0) {
				location.reload();
				clearInterval(setTime);
			}

			daysText.innerText = days;
			hoursText.innerText = hours;
			minutesText.innerText = minutes;
			secondsText.innerText = seconds;
		}
	</script>
</body>
</html>
