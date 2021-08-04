{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LPMP</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('Logo_LPMP.png') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('welcomeBootstrap/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar fixed-top navbar-light bg-light static-top shadow-sm bg-white rounded">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('Logo_LPMP.png') }}" width="100" height="100"
                    style="vertical-align:middle;margin:20px 0px 0px 20px" />
                <span class="MyLinkText" style="font-size:150%;">
                    LPMP Riau
                </span>
            </a>
        </div>
    </nav>

    <!-- Icons Grid-->
    <section class="features-icons bg-light text-center"  style="padding-top:17vh;">
        @yield('content')
    </section>

    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#!">About</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Contact</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2021. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('welcomebootstrap/js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html> --}}

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
	<!-- Main navbar -->
	<div class="navbar navbar-expand-xl navbar-light navbar-static px-0">
        <div class="container">
            <div class="d-flex flex-1 align-items-center">
                <img src="{{ asset('Logo_LPMP.png') }}" class="mr-2 my-2" style="width: 80px; height: 80px" />
                <a href="index.html"><h1 class="m-0">LPMP</h1></a>
            </div>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Inner content -->
            <div class="content-inner">
				
                @yield('content')

                <!-- Footer -->
                <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
                    <div class="navbar-collapse collapse" id="navbar-footer">
                        <div class="container">
                            <span class="navbar-text">
                                &copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a
                                    href="https://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /footer -->
            </div>
            <!-- /inner content -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</body>

</html>
