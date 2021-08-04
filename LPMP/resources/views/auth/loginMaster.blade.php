<!doctype html>
<html lang="en">

<head>
    <title> @yield('title') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('Logo_LPMP.png') }}" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link href="{{asset('css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="{{ asset('loginbootstrap/css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">@yield('title')</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            @yield('icon')
                        </div>
                        <h3 class="text-center mb-4">Sign In</h3>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('loginbootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('loginbootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('loginbootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('loginbootstrap/js/main.js') }}"></script>

</body>

</html>
