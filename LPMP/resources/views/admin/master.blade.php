<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('Logo_LPMP.png') }}" />
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('js/plugins/visualization/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('js/plugins/maps/echarts/world.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/demo_charts/pages/dashboard_6/light/area_gradient.js') }}"></script>
    <script src="{{ asset('js/demo_charts/pages/dashboard_6/light/map_europe_effect.js') }}"></script>
    <script src="{{ asset('js/demo_charts/pages/dashboard_6/light/progress_sortable.js') }}"></script>
    <script src="{{ asset('js/demo_charts/pages/dashboard_6/light/bars_grouped.js') }}"></script>
    <script src="{{ asset('js/demo_charts/pages/dashboard_6/light/line_label_marks.js') }}"></script>
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
				<a href="/" class="d-inline-block"><h6 class="m-0">E-SPMI LPMP Riau</h6></a>
			</div>
		</div>

		<div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0">
			<ul class="navbar-nav navbar-nav-underline flex-row text-nowrap mx-auto">
				<li class="nav-item">
					<a href="/home" class="navbar-nav-link {{ (request()->is('home')) ? 'active' : '' }}">
						<i class="fas fa-home"></i>
						Home
					</a>
				</li>

				<li class="nav-item mega-menu-full nav-item-dropdown-xl">
                    <a href="/dataMaster" class="navbar-nav-link {{ request()->is('dataMaster') ? 'active' : '' }}">
                        <i class="fas fa-table"></i>
                        Data Master
                    </a>
                </li>

                <li class="nav-item dropdown nav-item-dropdown-xl">
                    <a href="/dataSetting"
                        class="navbar-nav-link {{ request()->is('dataSetting') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i>
                        Data Setting
                    </a>
                </li>

                <li class="nav-item dropdown nav-item-dropdown-xl">
                    <a href="/dataOperasional"
                        class="navbar-nav-link {{ request()->is('dataOperasional') ? 'active' : '' }}">
                        <i class="fas fa-user-cog fa-1x mr-1" ></i>
                        Data Operasional
                    </a>
                </li>

                <li class="nav-item dropdown nav-item-dropdown-xl">
                    <a href="/laporan" class="navbar-nav-link {{ request()->is('laporan') ? 'active' : '' }}">
                        <i class="fas fa-file"></i>
                        Laporan
                    </a>
                </li>
            </ul>
        </div>

        <div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
            <ul class="navbar-nav navbar-nav-underline flex-row">

                <li class="nav-item nav-item-dropdown-xl dropdown dropdown-user h-100">
                    <a href="#"
                        class="navbar-nav-link navbar-nav-link-toggler d-flex align-items-center h-100 dropdown-toggle"
                        data-toggle="dropdown">
                        <img src="{{ asset('images/placeholders/placeholder.jpg') }}" class="rounded-circle mr-xl-2"
                            height="38" alt="">
                        <span class="d-none d-xl-block">{{ $LoggedUserInfo['name'] }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
						<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-primary badge-pill ml-auto">58</span></a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a> --}}
                        <a href="{{ route('auth.logout') }}" class="dropdown-item"><i class="icon-switch2"></i>
                            Logout</a>
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
									<div class="card-header d-flex justify-content-between align-items-baseline">
										<h3 class="card-title ">Periode Siklus SPMI <b>(Siklus {{ $siklus->siklus }})</b> </h3>
											<div class="d-flex flex-row align-items-baseline">
												<h2 id="date-now">{{ $mulai }}</h2>
												<i class="fa fa-arrow-right mx-3"></i>
												<h2 id="date-end">{{ $selesai }}</h2>
											</div>
									</div>
									<div style="height: 2px; background-color: #ddd; margin: 0 20px;"></div>
									<div class="card-body p-3">
										@if ($siklus)
											<div id="time" class="d-flex flex-row align-items-start justify-content-center">
												<h1 id="days" style="font-size: 3.5em;">0</h1>
												<h4 id="daysText" class="mr-2">Hari</h4>
												<h1 id="hours" style="font-size: 3.5em;">00</h1>
												<h4 id="hoursText" class="mr-2">Jam</h4>
												<h1 id="minutes"  style="font-size: 3.5em;">00</h1>
												<h4 id="minutesText" class="mr-2">Menit</h4>
												<h1 id="seconds"  style="font-size: 3.5em;">00</h1>
												<h4 id="secondsText" class="mr-2">Detik</h4>
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
                        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                            data-target="#navbar-footer">
                            <i class="icon-unfold mr-2"></i>
                            Footer
                        </button>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-footer">
                        <span class="navbar-text">
                            &copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a
                                href="https://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
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
