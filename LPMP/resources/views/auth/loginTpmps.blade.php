@extends('auth/loginMaster')

@section('title', 'Login TPMPS')
@section('content')
    <form action="{{ route('auth.checkTpmps') }}" class="login-form" method="post">
        @if (Session::get('failTpmps'))
            <div class="alert alert-danger">
                {{ Session::get('failTpmps') }}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <input type="text" class="form-control rounded-left" name="username" placeholder="Username"
                value="{{ old('username') }}">
            <span class="text-danger">@error('username'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control rounded-left" name="password" placeholder="Password">
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
    </form>
@endsection
