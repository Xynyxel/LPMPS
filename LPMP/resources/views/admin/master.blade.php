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
				<a href="index.html" class="d-inline-block"><h6 class="m-0">LPMP</h6></a>
			</div>
		</div>

		<div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0">
			<ul class="navbar-nav navbar-nav-underline flex-row text-nowrap mx-auto">
				<li class="nav-item">
					<a href="/home" class="navbar-nav-link {{ (request()->is('home')) ? 'active' : '' }}">
						<i class="icon-home4 mr-2"></i>
						Home
					</a>
				</li>

				<li class="nav-item mega-menu-full nav-item-dropdown-xl">
					{{-- <a href="/data-master" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-make-group mr-2"></i>
						Data Master
					</a> --}}
                    <a href="/dataMaster" class="navbar-nav-link {{ request()->is('dataMaster') ? 'active' : '' }}">
                        <i class="icon-make-group mr-2"></i>
                        Data Master
                    </a>

                    {{-- <div class="dropdown-menu dropdown-content">
						<div class="d-xl-flex">
							<div class="d-flex flex-row flex-xl-column bg-light overflow-auto overflow-xl-visible rounded-top rounded-xl-top-0 rounded-xl-left">
								<div class="dropdown-content-body flex-1 border-bottom border-bottom-xl-0 py-2 py-xl-3">
									<div class="font-weight-semibold border-bottom d-none d-xl-block pb-2 mb-2">Navigation</div>
									<div class="nav flex-xl-column flex-nowrap justify-content-center wmin-xl-300">
										<a href="#tab_page" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0 active" data-toggle="tab">
											<i class="icon-stack2 position-static pr-1 mr-2"></i>
											Page
											<i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
										</a>
										<a href="#tab_navbars" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0" data-toggle="tab">
											<i class="icon-paragraph-justify3 position-static pr-1 mr-2"></i>
											Navbars
											<i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
										</a>
										<a href="#tab_sidebar_types" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0" data-toggle="tab">
											<i class="icon-list3 position-static pr-1 mr-2"></i>
											Sidebar types
											<i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
										</a>
										<a href="#tab_sidebar_content" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0" data-toggle="tab">
											<i class="icon-menu6 position-static pr-1 mr-2"></i>
											Sidebar content
											<i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
										</a>
										<a href="#tab_navigation" class="list-group-item list-group-item-action rounded" data-toggle="tab">
											<i class="icon-transmission position-static pr-1 mr-2"></i>
											Navigation
											<i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
										</a>
									</div>
								</div>
							</div>

							<div class="tab-content flex-xl-1">
								<div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade show active" id="tab_page">
									<div class="row">
										<div class="col-lg-4 mb-3 mb-lg-0">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Sections</div>
											<a href="layout_no_header.html" class="dropdown-item rounded">No header</a>
											<a href="layout_no_footer.html" class="dropdown-item rounded">No footer</a>
											<a href="layout_fixed_header.html" class="dropdown-item rounded">Fixed header</a>
											<a href="layout_fixed_footer.html" class="dropdown-item rounded">Fixed footer</a>
										</div>

										<div class="col-lg-4 mb-3 mb-lg-0">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Sidebars</div>
											<a href="layout_2_sidebars_1_side.html" class="dropdown-item rounded">2 sidebars on 1 side</a>
											<a href="layout_2_sidebars_2_sides.html" class="dropdown-item rounded">2 sidebars on 2 sides</a>
											<a href="layout_3_sidebars.html" class="dropdown-item rounded">3 sidebars</a>
										</div>

										<div class="col-lg-4">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Layout</div>
											<a href="layout_static.html" class="dropdown-item rounded">Static layout</a>
											<a href="layout_boxed_page.html" class="dropdown-item rounded">Boxed page</a>
											<a href="layout_liquid_content.html" class="dropdown-item rounded">Liquid content</a>
										</div>
									</div>
								</div>

								<div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade" id="tab_navbars">
									<div class="row">
										<div class="col-lg-3 mb-3 mb-lg-0">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Single</div>
											<a href="navbar_single_bottom_fixed.html" class="dropdown-item rounded">Bottom fixed</a>
											<a href="navbar_single_header_before.html" class="dropdown-item rounded">Before page header</a>
											<a href="navbar_single_header_before_fixed.html" class="dropdown-item rounded">Before page header fixed</a>
											<a href="navbar_single_header_after.html" class="dropdown-item rounded">After page header</a>
											<a href="navbar_single_header_after_sticky.html" class="dropdown-item rounded">After page header sticky</a>
										</div>

										<div class="col-lg-3 mb-3 mb-lg-0">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Multiple</div>
											<a href="navbar_multiple_top_static.html" class="dropdown-item rounded">Top static</a>
											<a href="navbar_multiple_top_fixed.html" class="dropdown-item rounded">Top fixed</a>
											<a href="navbar_multiple_bottom_static.html" class="dropdown-item rounded">Bottom static</a>
											<a href="navbar_multiple_bottom_fixed.html" class="dropdown-item rounded">Bottom fixed</a>
											<a href="navbar_multiple_top_bottom_fixed.html" class="dropdown-item rounded">Top and bottom fixed</a>
										</div>

										<div class="col-lg-3 mb-3 mb-lg-0">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Content</div>
											<a href="navbar_component_single.html" class="dropdown-item rounded">Single navbar</a>
											<a href="navbar_component_multiple.html" class="dropdown-item rounded">Multiple navbars</a>
										</div>

										<div class="col-lg-3">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Other</div>
											<a href="navbar_colors.html" class="dropdown-item rounded">Color options</a>
											<a href="navbar_sizes.html" class="dropdown-item rounded">Sizing options</a>
											<a href="navbar_components.html" class="dropdown-item rounded">Navbar components</a>
										</div>
									</div>
								</div>

								<div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade" id="tab_sidebar_types">
									<div class="row">
										<div class="col-lg-3 mb-3 mb-lg-0">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Main</div>
											<a href="sidebar_default_resizable.html" class="dropdown-item rounded">Resizable</a>
											<a href="sidebar_default_resized.html" class="dropdown-item rounded">Resized</a>
											<a href="sidebar_default_collapsible.html" class="dropdown-item rounded">Collapsible</a>
											<a href="sidebar_default_collapsed.html" class="dropdown-item rounded">Collapsed</a>
											<a href="sidebar_default_hideable.html" class="dropdown-item rounded">Hideable</a>
											<a href="sidebar_default_hidden.html" class="dropdown-item rounded">Hidden</a>
											<a href="sidebar_default_color_dark.html" class="dropdown-item rounded">Dark color</a>
										</div>

										<div class="col-lg-3 mb-3 mb-lg-0">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Secondary</div>
											<a href="sidebar_secondary_collapsible.html" class="dropdown-item rounded">Collapsible</a>
											<a href="sidebar_secondary_collapsed.html" class="dropdown-item rounded">Collapsed</a>
											<a href="sidebar_secondary_hideable.html" class="dropdown-item rounded">Hideable</a>
											<a href="sidebar_secondary_hidden.html" class="dropdown-item rounded">Hidden</a>
											<a href="sidebar_secondary_color_dark.html" class="dropdown-item rounded">Dark color</a>
										</div>

										<div class="col-lg-3 mb-3 mb-lg-0">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Right</div>
											<a href="sidebar_right_collapsible.html" class="dropdown-item rounded">Collapsible</a>
											<a href="sidebar_right_collapsed.html" class="dropdown-item rounded">Collapsed</a>
											<a href="sidebar_right_hideable.html" class="dropdown-item rounded">Hideable</a>
											<a href="sidebar_right_hidden.html" class="dropdown-item rounded">Hidden</a>
											<a href="sidebar_right_color_dark.html" class="dropdown-item rounded">Dark color</a>
										</div>

										<div class="col-lg-3">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Content</div>
											<a href="sidebar_content_left.html" class="dropdown-item rounded">Left aligned</a>
											<a href="sidebar_content_left_stretch.html" class="dropdown-item rounded">Left stretched</a>
											<a href="sidebar_content_left_sections.html" class="dropdown-item rounded">Left sectioned</a>
											<a href="sidebar_content_right.html" class="dropdown-item rounded">Right aligned</a>
											<a href="sidebar_content_right_stretch.html" class="dropdown-item rounded">Right stretched</a>
											<a href="sidebar_content_right_sections.html" class="dropdown-item rounded">Right sectioned</a>
											<a href="sidebar_content_color_dark.html" class="dropdown-item rounded">Dark color</a>
										</div>
									</div>
								</div>

								<div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade" id="tab_sidebar_content">
									<div class="row">
										<div class="col-lg-6 mb-3 mb-lg-0">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Sticky areas</div>
											<a href="sidebar_sticky_header.html" class="dropdown-item rounded">Header</a>
											<a href="sidebar_sticky_footer.html" class="dropdown-item rounded">Footer</a>
											<a href="sidebar_sticky_header_footer.html" class="dropdown-item rounded">Header and footer</a>
											<a href="sidebar_sticky_custom.html" class="dropdown-item rounded">Custom elements</a>
										</div>

										<div class="col-lg-6">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Other</div>
											<a href="sidebar_components.html" class="dropdown-item rounded">Sidebar components</a>
										</div>
									</div>
								</div>

								<div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade" id="tab_navigation">
									<div class="row">
										<div class="col-lg-6 mb-3 mb-lg-0">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Vertical</div>
											<a href="navigation_vertical_collapsible.html" class="dropdown-item rounded">Collapsible menu</a>
											<a href="navigation_vertical_accordion.html" class="dropdown-item rounded">Accordion menu</a>
											<a href="navigation_vertical_bordered.html" class="dropdown-item rounded">Bordered navigation</a>
											<a href="navigation_vertical_right_icons.html" class="dropdown-item rounded">Right icons</a>
											<a href="navigation_vertical_badges.html" class="dropdown-item rounded">Badges</a>
											<a href="navigation_vertical_disabled.html" class="dropdown-item rounded">Disabled items</a>
										</div>

										<div class="col-lg-6">
											<div class="font-weight-semibold border-bottom pb-2 mb-2">Horizontal</div>
											<a href="navigation_horizontal_click.html" class="dropdown-item rounded">Submenu on click</a>
											<a href="navigation_horizontal_hover.html" class="dropdown-item rounded">Submenu on hover</a>
											<a href="navigation_horizontal_elements.html" class="dropdown-item rounded">With custom elements</a>
											<a href="navigation_horizontal_tabs.html" class="dropdown-item rounded">Tabbed navigation</a>
											<a href="navigation_horizontal_disabled.html" class="dropdown-item rounded">Disabled navigation links</a>
											<a href="navigation_horizontal_mega.html" class="dropdown-item rounded">Horizontal mega menu</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
                </li>

                <li class="nav-item dropdown nav-item-dropdown-xl">
                    {{-- <a href="/data-setting" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-strategy mr-2"></i>
						Data Setting
					</a> --}}
                    <a href="/dataSetting"
                        class="navbar-nav-link {{ request()->is('dataSetting') ? 'active' : '' }}">
                        <i class="icon-strategy mr-2"></i>
                        Data Setting
                    </a>

                    {{-- <div class="dropdown-menu dropdown-scrollable-xl">
						<div class="dropdown-submenu">
							<a href="#" class="dropdown-item dropdown-toggle">Sidebars</a>
							<div class="dropdown-menu">
								<a href="../seed/layout_2_sidebars_1_side.html" class="dropdown-item rounded">2 sidebars on 1 side</a>
								<a href="../seed/layout_2_sidebars_2_sides.html" class="dropdown-item rounded">2 sidebars on 2 sides</a>
								<a href="../seed/layout_3_sidebars.html" class="dropdown-item rounded">3 sidebars</a>
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<a href="../seed/layout_static.html" class="dropdown-item rounded">Static layout</a>
					</div> --}}
                </li>

                <li class="nav-item dropdown nav-item-dropdown-xl">
                    <a href="/dataOperasional"
                        class="navbar-nav-link {{ request()->is('dataOperasional') ? 'active' : '' }}">
                        <i class="icon-strategy mr-2"></i>
                        Data Operasional
                    </a>
                </li>

                <li class="nav-item dropdown nav-item-dropdown-xl">
                    {{-- <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-loop3 mr-2"></i>
						Laporan
					</a> --}}
                    <a href="/laporan" class="navbar-nav-link {{ request()->is('laporan') ? 'active' : '' }}">
                        <i class="icon-loop3 mr-2"></i>
                        Laporan
                    </a>

                    {{-- <div class="dropdown-menu dropdown-menu-right dropdown-scrollable-xl">
						<div class="dropdown-header">Layouts &amp; themes</div>
						<div class="dropdown-submenu dropdown-submenu-left">
							<a href="#" class="dropdown-item dropdown-toggle"><i class="icon-grid6"></i> Layouts</a>
							<div class="dropdown-menu">
								<a href="../../../../layout_1/LTR/default/full/index.html" class="dropdown-item">Default layout</a>
								<a href="../../../../layout_2/LTR/default/full/index.html" class="dropdown-item">Layout 2</a>
								<a href="../../../../layout_3/LTR/default/full/index.html" class="dropdown-item">Layout 3</a>
								<a href="../../../../layout_4/LTR/default/full/index.html" class="dropdown-item">Layout 4</a>
								<a href="../../../../layout_5/LTR/default/full/index.html" class="dropdown-item">Layout 5</a>
								<a href="index.html" class="dropdown-item active">Layout 6</a>
								<a href="../../../../layout_7/LTR/default/full/index.html" class="dropdown-item disabled">
									Layout 7
									<span class="badge bg-transparent align-self-center ml-auto">Coming soon</span>
								</a>
							</div>
						</div>
						<div class="dropdown-submenu dropdown-submenu-left">
							<a href="#" class="dropdown-item dropdown-toggle"><i class="icon-droplet"></i> Themes</a>
							<div class="dropdown-menu">
								<a href="index.html" class="dropdown-item active">Default</a>
								<a href="../../../LTR/material/full/index.html" class="dropdown-item">Material</a>
								<a href="../../../LTR/dark/full/index.html" class="dropdown-item">Dark</a>
								<a href="../../../LTR/clean/full/index.html" class="dropdown-item disabled">
									Clean
									<span class="badge bg-transparent align-self-center ml-auto">Coming soon</span>
								</a>
							</div>
						</div>
						<div class="dropdown-header">Other</div>
						<a href="../../../RTL/default/full/index.html" class="dropdown-item">
							<i class="icon-width"></i>
							RTL version
						</a>
					</div> --}}
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

    @yield('notification')

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
</body>

</html>
