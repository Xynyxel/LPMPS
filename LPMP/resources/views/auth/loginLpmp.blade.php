<html lang="en">
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
                <h4>Login LPMP</h4><hr>
                <form action="{{ route('auth.checkLpmp') }}" method="post">
                    @if(Session::get('failLpmp'))
                        <div class="alert alert-danger">
                            {{ Session::get('failLpmp') }}
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
</html>