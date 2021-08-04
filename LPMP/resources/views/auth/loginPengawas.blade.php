@extends('auth/loginMaster')

@section('title', 'Login Pengawas')
@section('icon')
    <span class='fa fa-user-tie fa-2x'></span>
@endsection
@section('content')
    <form action="{{ route('auth.checkPengawas') }}" class="login-form" method="post">
        @if(Session::get('failPengawas'))
        <div class="alert alert-danger">
            {{ Session::get('failPengawas') }}
        </div>
    @endif
        @csrf
        <div class="form-group">
            <input type="text" class="form-control rounded-left" name="username" placeholder="Username" value="{{ old('username') }}" required>
            <span class="text-danger">@error('username'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <div class="input-group mb-2">
                <input type="password" class="form-control rounded-left" name="password" placeholder="Password" id="password" required>
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-eye" id="togglePassword"></i>
                    </div>
                </div>
            </div>
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
        </div>
    </form>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.type === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection

{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:200px">
            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column ">
                <h4>Login Pengawas</h4><hr>
                <form action="{{ route('auth.checkPengawas') }}" method="post">
                    @if(Session::get('failPengawas'))
                        <div class="alert alert-danger">
                            {{ Session::get('failPengawas') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" value="{{ old('username') }}">
                        <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>
</html> --}}