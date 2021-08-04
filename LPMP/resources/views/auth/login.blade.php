@extends('auth/loginMaster')

@section('title', 'Login Admin')
@section('icon')
    <span class='fa fa-user-cog fa-2x'></span>
@endsection
@section('content')
    <form action="{{ route('auth.check') }}" class="login-form" method="post">
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <input type="text" class="form-control rounded-left" name="name" placeholder="Name" value="{{ old('name') }}" required>
            <span class="text-danger">@error('name'){{ $message }} @enderror</span>
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
